<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Berita;
use App\Models\BukuTamu;
use App\Models\BeritaRecent;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;

class AppBeritaController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }

    public function index(Request $request)
    {
        $query = $request->input('search_query');

        if ($d = request('kategori-berita')) {
            $kategoriBerita = KategoriBerita::query()
                ->where('nama_kategori', '=', $d)
                ->first();
            $berita_id = $this->hashids->decode($kategoriBerita['id'])[0];

            $beritas = Berita::query()
                ->where('kategori_id', '=', $berita_id)->paginate(3);
        } elseif ($query) {
            $beritas = Berita::query()
                ->where('title', 'LIKE', "%{$query}%")
                ->orWhere('isi', 'LIKE', "%{$query}%")
                ->paginate(3);
        } else {
            $beritas = Berita::query()
                ->paginate(3);
        }

        // Terakhir dikunjungi
        $recent = BeritaRecent::query()->latest()->limit(3)->get();
        // Count KategoriBerita
        $kategorisBerita = KategoriBerita::query()
            ->select('kategori_beritas.nama_kategori')
            ->withCount('beritas_postingan')
            ->get();
        return view('app.blog.index', compact('beritas', 'kategorisBerita', 'recent'));
    }

    public function show($postId)
    {

        try {
            // Dekode ID Postingan
            $berita_id = $this->hashids->decode($postId)[0];
            if (auth()->check()) {
                // Temukan tamu yang sedang aktif
                $tamu = BukuTamu::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->first();

                if ($tamu) {
                    // Mendekode ID Tamu
                    $tamu_id = $this->hashids->decode($tamu->id)[0];

                    // Menyimpan data postingan berita ke dalam kolom last_visited_post_id
                    $tamu->last_visited_post_id = $berita_id;
                    $tamu->save();
                    // Mengambil 3 data terbaru dari model EventRecent
                    $recentEvents = BeritaRecent::latest()->take(3)->get();

                    // Mengecek apakah sudah mencapai batasan 3 data
                    if ($recentEvents->count() >= 3) {
                        // Menghapus data terlama
                        $recentEvents->last()->delete();
                    }
                    // Catat kunjungan tamu ke postingan dengan membuat entri baru di tabel tamu_post_visits yang berada pada relasi Model BukuTamu
                    $visitedAt = Carbon::now();

                    $tamu->lastVisitedBeritas()->attach($tamu_id, ['berita_id' => $berita_id, 'visited_at' => $visitedAt, 'created_at' => now(), 'updated_at' => now()]);
                }
            }
            $beritaPostingan = Berita::findOrFail($berita_id);
        } catch (\Throwable $th) {
            return redirect()->back();
        }

        return view('app.blog.show', compact('beritaPostingan'));
    }
}

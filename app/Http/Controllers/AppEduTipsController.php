<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Artikel;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use App\Models\ArtikelRecent;
use App\Models\KategoriArtikel;

class AppEduTipsController extends Controller
{

    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }

    public function index(Request $request)
    {
        $query = $request->input('search_query');

        if ($d = request('kategori-artikel')) {
            $kategoriArtikel = KategoriArtikel::query()
                ->where('nama_kategori', '=', $d)
                ->first();
            $artikel_id = $this->hashids->decode($kategoriArtikel['id'])[0];

            $artikels = Artikel::query()
                ->where('kategori_id', '=', $artikel_id)->paginate(3);
        } elseif ($query) {
            $artikels = Artikel::query()
                ->where('title', 'LIKE', "%{$query}%")
                ->orWhere('isi', 'LIKE', "%{$query}%")
                ->paginate(3);
        } else {
            $artikels = Artikel::query()
                ->paginate(3);
        }

        // Terakhir dikunjungi
        $recent = ArtikelRecent::query()->latest()->limit(3)->get();
        // Count KategoriArtikel
        $kategorisArtikel = KategoriArtikel::query()
            ->select('kategori_artikels.nama_kategori')
            ->withCount('artikels_postingan')
            ->get();
        return view('app.artikel.index', compact('artikels', 'kategorisArtikel', 'recent'));
    }

    public function show($postId)
    {

        try {
            // Dekode ID Postingan
            $artikel_id = $this->hashids->decode($postId)[0];
            if (auth()->check()) {
                // Temukan tamu yang sedang aktif
                $tamu = BukuTamu::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->first();

                if ($tamu) {
                    // Mendekode ID Tamu
                    $tamu_id = $this->hashids->decode($tamu->id)[0];

                    // Menyimpan data postingan berita ke dalam kolom last_visited_post_id
                    $tamu->last_visited_post_id = $artikel_id;
                    $tamu->save();
                    // Mengambil 3 data terbaru dari model ArtikelRecent
                    $recentArtikels = ArtikelRecent::latest()->take(3)->get();

                    // Mengecek apakah sudah mencapai batasan 3 data
                    if ($recentArtikels->count() >= 3) {
                        // Menghapus data terlama
                        $recentArtikels->last()->delete();
                    }
                    // Catat kunjungan tamu ke postingan dengan membuat entri baru di tabel tamu_post_visits yang berada pada relasi Model BukuTamu
                    $visitedAt = Carbon::now();
                    $tamu->lastVisitedArtikels()->attach($tamu_id, ['artikel_id' => $artikel_id, 'visited_at' => $visitedAt, 'created_at' => now(), 'updated_at' => now()]);
                }
            }
            $artikelPostingan = Artikel::findOrFail($artikel_id);
        } catch (\Throwable $th) {
            return redirect()->back();
        }

        return view('app.artikel.show', compact('artikelPostingan'));
    }
}

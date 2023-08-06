<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Wisata;
use App\Models\BukuTamu;
use Illuminate\Http\Request; 
use App\Models\TamuPostVisit;
use App\Models\KategoriWisata;
use Illuminate\Support\Facades\DB;
use App\Models\KatagoriVirtual;
class AppWisataController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }

    public function index(Request $request) 
    {
        $query = $request->input('search_query');

        if ($d = request('kategori-destinasi')) {
            $kategoriWisata = KategoriWisata::query()
                ->where('nama_kategori', '=', $d)
                
                ->first();
            $wisata_id = $this->hashids->decode($kategoriWisata['id'])[0];

            $wisatas = Wisata::query()
                ->where('kategori_id', '=', $wisata_id)->paginate(3);
        } elseif ($query) {
            $wisatas = Wisata::query()
                ->whereNotNull('author_member')
                ->where('status_public','active')
                ->where('title', 'LIKE', "%{$query}%")
                ->where('isi', 'LIKE', "%{$query}%") 
                ->orWhereNull('author_member')
                ->where('title', 'LIKE', "%{$query}%")
                ->where('isi', 'LIKE', "%{$query}%")
                ->paginate(3);
        } else {
            $wisatas = Wisata::query()
                ->whereNotNull('author_member')
                ->where('status_public','active') 
                ->orWhereNull('author_member')
                ->paginate(3);
        }
        // $kategorisWisata = KategoriWisata::query()
        //     ->select('kategori_wisatas.nama_kategori', DB::raw('COUNT(wisatas.id) as jumlah_postingan'))
        //     ->leftJoin('wisatas', 'kategori_wisatas.id', '=', 'wisatas.kategori_id')
        //     ->groupBy('kategori_wisatas.id', 'kategori_wisatas.nama_kategori')
        //     ->get();
        // Terakhir dikunjungi
        $recent = TamuPostVisit::query()->latest()->limit(3)->get();
        // Count KategoriWisata
        $kategorisWisata = KategoriWisata::query()
            ->select('kategori_wisatas.nama_kategori')
            ->withCount('wisatas_postingan')
            ->get();
        return view('app.wisata.index', compact('wisatas', 'kategorisWisata', 'recent'));
    }

    public function show($postId)
    {
       // try {
            // Dekode ID Postingan
            $wisata_id = $this->hashids->decode($postId)[0];

            if (auth()->check()) {
                // Temukan tamu yang sedang aktif
                $tamu = BukuTamu::query()
                    ->where('user_id', '=', auth()->user()->id)
                    ->first();

                if ($tamu) {
                    // Mendekode ID Tamu
                    $tamu_id = $this->hashids->decode($tamu->id)[0];

                    // Menyimpan data postingan wisata ke dalam kolom last_visited_post_id
                    $tamu->last_visited_post_id = $wisata_id;
                    $tamu->save();

                    // Mengambil 3 data terbaru dari model EventRecent
                    $recentEvents = TamuPostVisit::latest()->take(3)->get();

                    // Mengecek apakah sudah mencapai batasan 3 data
                    if ($recentEvents->count() >= 3) {
                        // Menghapus data terlama
                        $recentEvents->last()->delete();
                    }
                    // Catat kunjungan tamu ke postingan dengan membuat entri baru di tabel tamu_post_visits yang berada pada relasi Model BukuTamu
                    $visitedAt = Carbon::now();

                    $tamu->lastVisitedPosts()->attach($tamu_id, ['wisata_id' => $wisata_id, 'visited_at' => $visitedAt, 'created_at' => now(), 'updated_at' => now()]);
                }
            }
            $wisataPostingan = Wisata::find($wisata_id);
            if(@$wisataPostingan->id_ruangan)
            { 
             
                $ruangan=DB::table('tb_ruang')->where('id_kat',@$wisataPostingan->id_ruangan)->where('kode_ruangan','FrontRoom')->first();

           // dd(@$ruangan);
                $hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
               @$wisataPostingan->id_ruangan=$hashids->encode(@$ruangan->id); 
              
            }
        // } catch (\Throwable $th) {
        //   //  return redirect()->back();
        // }

        return view('app.wisata.show', compact('wisataPostingan')); 
    }
 public function virtualview(Request $request)
    {
        return view('app.vr.index');
    }

 public function getrooms(Request $request)
    {
        $cek_typemarker     = array('AddPicture');
        if (@$request->input('id_vir')) {
            $dec               = @$this->hashids->decode($request->input('id_vir'))[0];
            $vir               = DB::table('tb_ruang')->where('id', $dec)->first();
        } else {
            $vir               = DB::table('tb_ruang')->where('kode_ruangan', 'FrontRoom')->first();
            $dec               = @$vir->id;
        }
        if (!$vir) {
            $vir               = DB::table('tb_ruang')->orderBy('id','DESC')->first();
            $dec               = @$vir->id;
        } 

        $tb_mar             = DB::table('tb_marker')->where('ruangan_id', $dec)->get();
        $i                  = 0;
        $data_marker        = array();
        foreach ($tb_mar as $key) {
            $value                = @unserialize(@$key->value) ? @unserialize(@$key->value) : array();

            $value['id']          = 'marker_saving-' . @$key->id;
            if (in_array($value['typemarker'], $cek_typemarker)) {
                $value['link'] =  asset('storage/' . $value['link']);
            } else {
                $type_link          = $value['typemarker'] == 'AddRooms' ? 'rooms' : 'games';
                //$value['link']      =url($type_link,$value['link']);

                $value['link']      = $value['link'];
            }

            $data_marker[$i] = $value;
            $i++;
        }
        print json_encode(array('vir' => $vir, 'marker' => $data_marker));
    }
 
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hashids\Hashids;
use App\Models\Event;
use App\Models\BukuTamu;
use App\Models\EventPengguna;
use App\Models\EventRecent;
use Illuminate\Http\Request;
use App\Models\KategoriEvent;

class AppEventController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }


    public function index(Request $request)
    {
        $query = $request->input('search_query');

        if ($d = request('kategori-event')) {
            $kategoriEvent = KategoriEvent::query()
                ->where('nama_kategori', '=', $d)
                ->first();
            $event_id = $this->hashids->decode($kategoriEvent['id'])[0];

            $events = Event::query()
                ->where('kategori_id', '=', $event_id)->paginate(3);
        } elseif ($query) {
            $events = Event::query()
                ->where('title', 'LIKE', "%{$query}%")
                ->orWhere('isi', 'LIKE', "%{$query}%")
                ->paginate(3);
        } else {
            $events = Event::query()
                ->paginate(3);
        }

        // Terakhir dikunjungi
        $recent = EventRecent::query()->latest()->limit(3)->get();
        // Count KategoriEvent
        $kategorisEvent = KategoriEvent::query()
            ->select('kategori_events.nama_kategori')
            ->withCount('events_postingan')
            ->get();
        return view('app.event.index', compact('events', 'kategorisEvent', 'recent'));
    }

    public function show($postId)
    {
        // Dekode ID Postingan
        $event_id = $this->hashids->decode($postId)[0];
        if (auth()->check()) {
            // Temukan tamu yang sedang aktif
            $tamu = BukuTamu::query()
                ->where('user_id', '=', auth()->user()->id)
                ->first();
            // Mendekode ID Tamu
            if ($tamu) {
                $tamu_id = $this->hashids->decode($tamu['id'])[0];
            } else {
                $tamu_id = '';
            }
            // Cek Apakah Tamu sudah mengikuti event tersebut atau belum
            $eventPenggunaStatus = EventPengguna::query()
                ->where([
                    [
                        'tamu_id', '=', $tamu_id
                    ],
                    [
                        'event_id', '=', $event_id
                    ]
                ])
                ->first();

            if ($tamu) {

                // Menyimpan data postingan event ke dalam kolom last_visited_post_id
                $tamu->last_visited_post_id = $event_id;
                $tamu->save();

                // Mengambil 3 data terbaru dari model EventRecent
                $recentEvents = EventRecent::latest()->take(3)->get();

                // Mengecek apakah sudah mencapai batasan 3 data
                if ($recentEvents->count() >= 3) {
                    // Menghapus data terlama
                    $recentEvents->last()->delete();
                }
                // Catat kunjungan tamu ke postingan dengan membuat entri baru di tabel tamu_post_visits yang berada pada relasi Model BukuTamu
                $visitedAt = Carbon::now();
                $tamu->lastVisitedEvents()->attach($tamu_id, ['event_id' => $event_id, 'visited_at' => $visitedAt, 'created_at' => now(), 'updated_at' => now()]);
            }
        } else {
            $eventPenggunaStatus = '';
        }
        $eventPostingan = Event::findOrFail($event_id);
        return view('app.event.show', compact('eventPostingan', 'eventPenggunaStatus'));
    }

 public function joinevent(Request $request)
    {
        $error=true;
        $alert='';
        $event_id = $this->hashids->decode($request->input('id_event'))[0];
        $check_tamu=BukuTamu::where('user_id',$request->input('id_member'))->first();
        if($check_tamu)
        {

            $check_event=EventPengguna::where('event_id',$event_id)->where('tamu_id',@$this->hashids->decode(@$check_tamu->id)[0])->first();
            if($check_event)
            {
                 $alert .='<li>Anda Sudah Terdaftar dalam event ini</li>';
            }
        }
        else
        {

            $alert .=$request->input('email')?'':'<li>Email wajib di isikan</li>';
            $alert .=$request->input('no_hp')?'':'<li>No Hp wajib di isikan</li>';
            $alert .=$request->input('alamat')?'':'<li>Alamat wajib di isikan</li>';
            $alert .=$request->input('instansi')?'':'<li>Instansi wajib di isikan</li>'; 
              
        }
            if($alert=="")
            {
                $dt_tamu=new BukuTamu;
                $dt_tamu->user_id=$request->input('id_member');
                $dt_tamu->pelindung=$request->input('instansi');
                $dt_tamu->no_hp=$request->input('no_hp');
                $dt_tamu->alamat=$request->input('alamat');
                $dt_tamu->save();
                 EventPengguna::create([
                    'tamu_id' => @$this->hashids->decode(@$dt_tamu->id)[0],
                    'event_id' => $event_id]);
                 $alert .='<li>Anda berhasil mengikuti Event. info selanjutnya akan segera kami check melalui profile anda</li>';
                $error=false;
            }
              print json_encode(array('error'=>$error,'alert'=>$alert));
    }
    
}

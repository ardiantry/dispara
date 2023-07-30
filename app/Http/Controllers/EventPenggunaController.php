<?php

namespace App\Http\Controllers;

use App\Models\EventPengguna;
use App\Http\Requests\StoreEventPenggunaRequest;
use App\Http\Requests\UpdateEventPenggunaRequest;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Yajra\DataTables\Facades\DataTables; 

class EventPenggunaController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      //  $this->middleware(['auth', 'verified']);
        $this->Hashids = new \Hashids\Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }
    public function index()
    {
        $eventPengguna = EventPengguna::query()
            ->latest()
            ->get();
        return view('dashboard.eventPengguna.index', compact('eventPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventPenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventPenggunaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function show(EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventPenggunaRequest  $request
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventPenggunaRequest $request, EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventPengguna $eventPengguna)
    {
        //
    }
    public function prosesevent(Request $request)
    {
        if(@$request->input('id_event_pengguna'))
        {
            foreach (@$request->input('id_event_pengguna') as $ke) 
            {
                if(@$request->input('aksi')[$ke])
                {
                    EventPengguna::where('id',$this->Hashids->decode($ke))->update(['status'=>@$request->input('status')]);
                }
            }
        }
          print json_encode(array('error'=>false));

    }

 public function ajax_tbl_pengguna_event(Request $request)
    {
        $EventPengguna = EventPengguna::latest()->get();
        return DataTables::of($EventPengguna)
                 ->editColumn('aksi_input', function ($data) {
                    return ' <input type="checkbox" name="aksi['.$data->id.']" value="'.$data->id.'">
                             <input type="hidden" name="id_event_pengguna[]" value="'.$data->id.'">';
                })
                  ->editColumn('title', function ($data) {
                    return @$data->event['title'];
                })
                ->editColumn('nama', function ($data) {
                    return @$data->tamu->user['nama'];
                })
                 ->editColumn('pelindung', function ($data) {
                    return @$data->tamu['pelindung'];
                })
                 ->editColumn('no_hp', function ($data) {
                    return @$data->tamu['no_hp'];
                })
                  ->editColumn('email', function ($data) {
                    return @$data->tamu->user['email'];
                })
                 ->editColumn('status_', function ($data) {
                        switch(@$data->status)
                        {
                        case 'proses': 
                        $status_='<span class="badge badge-warning">Proses</span>'; 
                        break;
                        case  'setujui': 
                        $status_='<span class="badge badge-success">Setujui</span>';

                        break;
                        case'tolak':
                        $status_='<span class="badge badge-danger">Di tolak</span>';

                        break;
                        }
                    return $status_;
                })
                ->editColumn('created_at', function ($created) {
                    return \Carbon\Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y');
                }) 
                ->rawColumns(['aksi_input','status_'])
                ->addIndexColumn()
                ->make(true); 
    }
    

}

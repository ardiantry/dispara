<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Event;
use App\Models\KategoriEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest; 
use Yajra\DataTables\Facades\DataTables; 
use App\Models\EventPengguna;
use Illuminate\Http\Request;

class EventController extends Controller 
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY', 'MySecretSalt'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acaras = Event::query()
            ->get();
        return view('dashboard.acara.index', compact('acaras'));
    }
public function ajax_tbl_event(Request $request)
    {
        $Event = Event::latest()->get();
        return DataTables::of($Event)
                 ->editColumn('aksi_input', function ($data) {
                    return ' <input type="checkbox" name="aksi['.$data->id.']" value="'.$data->id.'">
                             <input type="hidden" name="id_event_pengguna[]" value="'.$data->id.'">';
                }) 
                ->editColumn('nama_kategori', function ($data) {
                    return @$data->kategori['nama_kategori'];
                })
                   ->editColumn('jumlah_peserta', function ($data) {
                   @$dataid= $this->hashids->decode(@$data->id)[0];
                    return EventPengguna::where('event_id',@$dataid)->count();
                })
                 ->editColumn('aksi', function ($data) {
                        return  '<a href="'.route('acara.edit', $data['id']).'"
                                            class="btn btn-outline-secondary btn-sm edit"
                                            data-bs-container="#tooltip-container0" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary HPSEvent"
                                            data-bs-container="#tooltip-container0" title="Delete" data-id="'.$data['id'].'"
                                            data-title="'.$data['title'].'">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        ';
                   
                })
                ->editColumn('created_at', function ($created) {
                    return \Carbon\Carbon::parse($created->created_at)->isoFormat('dddd, DD MMMM Y');
                }) 
                ->rawColumns(['aksi'])
                ->addIndexColumn()
                ->make(true); 
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_acaras = KategoriEvent::query()
            ->get();
        return view('dashboard.acara.create', compact('kategori_acaras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $request->hasFile('image') ? $validatedData['image'] = $request->file('image')->store('event_image') : '';
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            $validatedData['author'] = @$request->input('author')?@$request->input('author'):Auth::user()->name;
            Event::create($validatedData);
            return to_route('acara.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $kategori_acaras = KategoriEvent::query()->get();
            $acara = Event::query()
                ->findOrFail($id);
            return view('dashboard.acara.edit', compact('acara', 'kategori_acaras'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $hashids)
    {
        $validatedData = $request->validated();
        try {
            $id = $this->hashids->decode($hashids)[0];
            $events = DB::table('events')
                ->where('id', '=', $id);
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            if ($request->hasFile('image')) :
                Storage::delete($events->first()->image);
                $validatedData['image'] = $request->file('image')->store('event_image');
            endif;
            $validatedData['author'] = @$request->input('author')?@$request->input('author'):Auth::user()->name;

            $events->update($validatedData);

            return to_route('acara.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $events = DB::table('events')
                ->where('id', '=', $id);
            if ($img = $events->first()->image) :
                Storage::delete($img);
                $events->delete();
            endif;
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
public function hapusacara(Request $request)
    {
         
            $id = $this->hashids->decode( $request->input('id'))[0];
            $events = DB::table('events')->where('id', '=', $id);
           $events->delete();
         print json_encode(array('error'=>false))
        
    }

}

<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\{Wisata, KategoriWisata};
use App\Http\Requests\StoreWisataRequest;
use App\Http\Requests\UpdateWisataRequest;

class WisataController extends Controller
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
        $wisatas = Wisata::query()
            ->latest()
            ->get();
        return view('dashboard.wisata.index', compact('wisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()
    {
        $kategori_wisatas = KategoriWisata::query()->get();
        return view('dashboard.wisata.create', compact('kategori_wisatas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWisataRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $request->hasFile('image') ? $validatedData['image'] = $request->file('image')->store('wisata_image') : '';
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            $validatedData['author'] = auth()->user()->name; 
            $validatedData['id_ruangan'] = $request->input('id_ruangan'); 
            Wisata::create($validatedData);
            return to_route('wisata.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal ditambahkan');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $kategori_wisatas = KategoriWisata::query()->get();
            $wisata = Wisata::query()
                ->findOrFail($id);
            return view('dashboard.wisata.edit', compact('wisata', 'kategori_wisatas'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWisataRequest  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWisataRequest $request, $hashids)
    {
        $validatedData = $request->validated();
        try {
            $id = $this->hashids->decode($hashids)[0];
            $berita = DB::table('wisatas')
                ->where('id', '=', $id);
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            $validatedData['id_ruangan'] = $request->input('id_ruangan'); 
            if ($request->hasFile('image')) :
                Storage::delete($berita->first()->image);
                $validatedData['image'] = $request->file('image')->store('wisata_image');
            endif;

            $berita->update($validatedData);

            return to_route('wisata.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $wisata = DB::table('wisatas')
                ->where('id', '=', $id);
            if ($img = $wisata->first()->image) :
                Storage::delete($img);
                $wisata->delete();
            endif;
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}

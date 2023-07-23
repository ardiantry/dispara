<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Berita;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
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
        $beritas = Berita::query()
            ->latest()
            ->get();
        return view('dashboard.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_beritas = KategoriBerita::query()->get();
        return view('dashboard.berita.create', compact('kategori_beritas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBeritaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBeritaRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $request->hasFile('image') ? $validatedData['image'] = $request->file('image')->store('berita_image') : '';
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            $validatedData['author'] = auth()->user()->name;
            $d = Berita::create($validatedData);
            return to_route('berita.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return throw $th;
            return back()->with('error', 'Gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $kategori_beritas = KategoriBerita::query()->get();
            $berita = Berita::query()
                ->findOrFail($id);
            return view('dashboard.berita.edit', compact('berita', 'kategori_beritas'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBeritaRequest  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBeritaRequest $request, $hashids)
    {
        $validatedData = $request->validated();
        try {
            $id = $this->hashids->decode($hashids)[0];
            $berita = DB::table('beritas')
                ->where('id', '=', $id);
            $validatedData['kategori_id'] = $this->hashids->decode($validatedData['kategori_id'])[0];
            if ($request->hasFile('image')) :
                Storage::delete($berita->first()->image);
                $validatedData['image'] = $request->file('image')->store('berita_image');
            endif;

            $berita->update($validatedData);

            return to_route('berita.index')->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            $berita = DB::table('beritas')
                ->where('id', '=', $id);
            if ($img = $berita->first()->image) :
                Storage::delete($img);
                $berita->delete();
            endif;
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('success', 'Terjadi kesalahan');
        }
    }
}

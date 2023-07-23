<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\KategoriArtikel;
use App\Http\Requests\StoreKategoriArtikelRequest;
use App\Http\Requests\UpdateKategoriArtikelRequest;
use App\Models\KategoriBerita;
use Exception;

class KategoriArtikelController extends Controller
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
        $kategoriArtikel = KategoriArtikel::query()
            ->latest()
            ->get();
        return view('dashboard.KategoriArtikel.index', compact('kategoriArtikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategoriArtikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriArtikelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriArtikelRequest $request)
    {
        $validatedData = $request->validated();

        try {
            KategoriArtikel::create($validatedData);
            return to_route('kategori-artikel.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];

            $kategori = KategoriArtikel::query()
                ->findOrFail($id);

            return view('dashboard.kategoriArtikel.edit', compact('kategori'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriArtikelRequest  $request
     * @param  \App\Models\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriArtikelRequest $request, $hashids)
    {
        if (!isset($this->hashids->decode($hashids)[0])) {
            return back()->with('error', 'Gagal diubah');
        } else {
            $id = $this->hashids->decode($hashids)[0];
        }
        $validated = $request->validated();
        // Messages Response
        $messages = array(
            'unique' => 'Data tidak boleh sama'
        );
        $kategori = KategoriArtikel::query()
            ->findOrFail($id);
        // Validasi data yang sama
        $validated['nama_kategori'] !== $kategori['nama_kategori'] ? $request->validate(['nama_kategori' => 'unique:kategori_artikels,nama_kategori'], $messages) : '';
        try {
            // update
            $kategori->update($validated);
            return to_route('kategori-artikel.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            KategoriArtikel::query()->findOrFail($id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal dihapus');
        }
    }
}

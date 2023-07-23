<?php

namespace App\Http\Controllers;

use Throwable;
use Hashids\Hashids;
use App\Models\KategoriBerita;
use App\Http\Requests\StoreKategoriBeritaRequest;
use App\Http\Requests\UpdateKategoriBeritaRequest;
use Exception;

class KategoriBeritaController extends Controller
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
        $kategoriBerita = KategoriBerita::query()
            ->latest()
            ->get();
        return view('dashboard.kategoriBerita.index', compact('kategoriBerita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategoriBerita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriBeritaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriBeritaRequest $request)
    {
        $validatedData = $request->validated();

        try {
            KategoriBerita::create($validatedData);
            return to_route('kategori-berita.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];

            $kategori = KategoriBerita::query()
                ->findOrFail($id);

            return view('dashboard.kategoriBerita.edit', compact('kategori'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriBeritaRequest  $request
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriBeritaRequest $request, $hashids)
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
        $kategori = KategoriBerita::query()
            ->findOrFail($id);
        // Validasi data yang sama
        $validated['nama_kategori'] !== $kategori['nama_kategori'] ? $request->validate(['nama_kategori' => 'unique:kategori_beritas,nama_kategori'], $messages) : '';
        try {
            // update
            $kategori->update($validated);
            return to_route('kategori-berita.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            KategoriBerita::query()->findOrFail($id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal dihapus');
        }
    }
}

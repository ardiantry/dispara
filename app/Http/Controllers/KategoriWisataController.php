<?php

namespace App\Http\Controllers;

use Exception;
use Hashids\Hashids;
use App\Models\KategoriWisata;
use App\Http\Requests\StoreKategoriWisataRequest;
use App\Http\Requests\UpdateKategoriWisataRequest;

class KategoriWisataController extends Controller
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
        $kategoriWisatas = KategoriWisata::query()
            ->latest()
            ->get();
        return view('dashboard.kategoriWisata.index', compact('kategoriWisatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategoriWisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriWisataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriWisataRequest $request)
    {
        $validatedData = $request->validated();

        try {
            KategoriWisata::create($validatedData);
            return to_route('kategori-wisata.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];

            $kategori = KategoriWisata::query()
                ->findOrFail($id);

            return view('dashboard.kategoriWisata.edit', compact('kategori'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriWisataRequest  $request
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriWisataRequest $request, $hashids)
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
        $kategori = KategoriWisata::query()
            ->findOrFail($id);
        // Validasi data yang sama
        $validated['nama_kategori'] !== $kategori['nama_kategori'] ? $request->validate(['nama_kategori' => 'unique:kategori_wisatas,nama_kategori'], $messages) : '';
        try {
            // update
            $kategori->update($validated);
            return to_route('kategori-wisata.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriWisata  $kategoriWisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            KategoriWisata::query()->findOrFail($id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal dihapus');
        }
    }
}

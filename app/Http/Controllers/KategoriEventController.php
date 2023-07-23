<?php

namespace App\Http\Controllers;

use Exception;
use Hashids\Hashids;
use App\Models\KategoriEvent;
use App\Http\Requests\StoreKategoriEventRequest;
use App\Http\Requests\UpdateKategoriEventRequest;

class KategoriEventController extends Controller
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
        $kategoriAcara = KategoriEvent::query()
            ->latest()
            ->get();
        return view('dashboard.kategoriAcara.index', compact('kategoriAcara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategoriAcara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKategoriEventRequest $request)
    {
        $validatedData = $request->validated();

        try {
            KategoriEvent::create($validatedData);
            return to_route('kategori-acara.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data gagal ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];

            $kategori = KategoriEvent::query()
                ->findOrFail($id);

            return view('dashboard.kategoriAcara.edit', compact('kategori'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriEventRequest  $request
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKategoriEventRequest $request, $hashids)
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
        $kategori = KategoriEvent::query()
            ->findOrFail($id);
        // Validasi data yang sama
        $validated['nama_kategori'] !== $kategori['nama_kategori'] ? $request->validate(['nama_kategori' => 'unique:kategori_events,nama_kategori'], $messages) : '';
        try {
            // update
            $kategori->update($validated);
            return to_route('kategori-acara.index')->with('success', 'Data berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriEvent  $kategoriEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($hashids)
    {
        try {
            $id = $this->hashids->decode($hashids)[0];
            KategoriEvent::query()->findOrFail($id)->delete();
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal dihapus');
        }
    }
}

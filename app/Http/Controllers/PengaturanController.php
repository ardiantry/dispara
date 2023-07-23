<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Pengaturan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePengaturanRequest;
use App\Http\Requests\UpdatePengaturanRequest;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
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
        $pengaturan = Pengaturan::query()
            ->first();
        return view('dashboard.pengaturan.index', compact('pengaturan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengaturanRequest  $request
     * @param  \App\Models\Pengaturan  $pengaturan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengaturanRequest $request, $hashids)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        try {
            $id = $this->hashids->decode($hashids)[0];
            $pengaturan = DB::table('pengaturans')->where('id', '=', $id);

            if ($request->hasFile('logo_web')) :
                $pengaturan->first()->logo_web !== null ? Storage::delete($pengaturan->first()->logo_web) : '';
                $validatedData['logo_web'] = $request->file('logo_web')->store('logo_web');
            endif;
            if ($request->hasFile('favicon')) :
                $pengaturan->first()->favicon !== null ? Storage::delete($pengaturan->first()->favicon) : '';
                $validatedData['favicon'] = $request->file('favicon')->store('favicon');
            endif;

            $pengaturan->update($validatedData);
            return back()->with('success', 'Update pengaturan berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahn');
        }
    }
}

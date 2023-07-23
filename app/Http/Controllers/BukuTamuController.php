<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids\Hashids;
use App\Models\BukuTamu;
use Illuminate\Http\Request;
use App\Models\EventPengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBukuTamuRequest;
use App\Http\Requests\UpdateBukuTamuRequest;

class BukuTamuController extends Controller
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
        $bukuTamu = BukuTamu::query()
            ->where('user_id', '=', auth()->user()->id)
            ->first();
        if ($bukuTamu) {
            $id_tamu = $this->hashids->decode($bukuTamu['id'])[0];
        } else {
            $id_tamu = '';
        }
        $eventPengguna = EventPengguna::query()
            ->where('tamu_id', '=',  $id_tamu)
            ->paginate(3);
        return view('app.eventPengguna.index', compact('eventPengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBukuTamuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuTamuRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            // Cek apakah dia pernah daftar atau belum
            $userLama = User::query()
                ->where('email', '=', $validated['email'])
                ->exists();
            if ($userLama) {
                return false;
            }
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'role' => '2'
            ]);
            $buku_tamu = BukuTamu::create([
                'user_id' => $user['id'],
                'pelindung' => $validated['pelindung'],
                'no_hp' => $validated['no_hp'],
                'alamat' => $validated['alamat'],
            ]);

            $id_tamu = $this->hashids->decode($buku_tamu['id'])[0];
            $event_id = $this->hashids->decode(request('postingan'))[0];

            EventPengguna::create([
                'tamu_id' => $id_tamu,
                'event_id' => $event_id
            ]);
            Auth::login($user);
            DB::commit();
            return back()->with('success', 'Kamu berhasil mendaftar event ini');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Terjadi Kesalahan');
        }
    }

    public function older()
    {
        try {
            $bukuTamu = BukuTamu::query()
                ->where('user_id', '=', auth()->user()->id)
                ->first();
            EventPengguna::create([
                'tamu_id' => $this->hashids->decode($bukuTamu['id'])[0],
                'event_id' => $this->hashids->decode(request('postingan'))[0]
            ]);
            return back()->with('success', 'Kamu berhasil mendaftar event ini');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi Kesalahan');
        }
    }
}

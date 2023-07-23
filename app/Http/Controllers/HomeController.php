<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\KategoriBerita;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::query()->latest()->paginate('3');
        // $kategorisBerita = KategoriBerita::query()
        //     ->select('kategori_beritas.nama_kategori')
        //     ->withCount('beritas_postingan')
        //     ->get();
        return view('app.index', compact('beritas'));
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppAbout extends Controller
{
    public function vismis()
    {
        return view('app.vismis.index');
    }

    public function tupoksi()
    {
        return view('app.tupoksi.index');
    }

    public function struktur()
    {
        return view('app.struktur.index');
    }

    public function profilPejabat()
    {
        return view('app.profilPejabat.index');
    }
}

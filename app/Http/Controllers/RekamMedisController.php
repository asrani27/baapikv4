<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RekamMedisController extends Controller
{
    public function index()
    {
        return view('admin.rekammedis.index');
    }

    public function cari()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function lb1()
    {
        return view('admin.laporan.lb1');
    }
    public function lb2()
    {
        return view('admin.laporan.lb2');
    }
    public function lb3()
    {
        return view('admin.laporan.lb3');
    }
    public function lb4()
    {
        return view('admin.laporan.lb4');
    }
}

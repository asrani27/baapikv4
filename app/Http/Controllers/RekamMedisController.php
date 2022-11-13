<?php

namespace App\Http\Controllers;

use App\Models\M_pasien;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class RekamMedisController extends Controller
{
    public function index()
    {
        $data = null;
        return view('admin.rekammedis.index', compact('data'));
    }

    public function cari()
    {
        //$output = shell_exec('php artisan');
        //$artisan = Artisan::call('perbaikandata');

        $keyword = request()->cari;
        $data = M_pasien::where('noRM', $keyword)->orWhere('nik', $keyword)->first();
        if ($data == null) {
            Session::flash('info', 'Data Tidak Ditemukan');
            return back();
        } else {

            return view('admin.rekammedis.index', compact('data'));
        }
    }
}

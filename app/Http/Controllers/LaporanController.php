<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\T_pendaftaran;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    public function kunjungan()
    {
        $data = null;
        return view('admin.laporan.kunjungan', compact('data'));
    }

    public function searchKunjungan()
    {
        $data = T_pendaftaran::get();
        $kunjSakit = request()->get('kunjSakit');
        $jkel = request()->get('jkel');
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');

        //dd($kunjSakit, $jkel, $bulan, $tahun);
        if ($data->count() != 0) {
            request()->flash();
            Session::flash('success', 'Berhasil Ditemukan');
            return view('admin.laporan.kunjungan', compact('data'));
        } else {
            Session::flash('info', 'Tidak ada data');
            return back();
        }
    }

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

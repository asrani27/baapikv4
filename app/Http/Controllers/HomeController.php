<?php

namespace App\Http\Controllers;

use App\Models\M_pasien;
use Carbon\Carbon;
use App\Models\Mpoli;
use App\Models\T_pendaftaran;
use App\Models\Tpermohonan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function superadmin()
    {
        $totalPasien = M_pasien::count();
        $today = Carbon::now()->format('d-m-Y');
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $pasienHariIni = T_pendaftaran::where('tglDaftar', $today)->count();
        $pasienMingguIni = T_pendaftaran::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();
        $pasienBulanIni = T_pendaftaran::whereMonth('created_at', $month)->whereYear('created_at', $year)->count();
        return view('admin.home', compact('totalPasien', 'pasienHariIni', 'pasienMingguIni', 'pasienBulanIni'));
    }

    public function pemohon()
    {
        $permohonan = Tpermohonan::orderBy('id', 'DESC')->get();
        return view('pemohon.home', compact('permohonan'));
    }
}

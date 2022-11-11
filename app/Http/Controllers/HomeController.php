<?php

namespace App\Http\Controllers;

use App\Models\M_diagnosa;
use Carbon\Carbon;
use App\Models\Mpoli;
use App\Models\M_poli;
use App\Models\M_pasien;
use App\Models\T_diagnosa;
use App\Models\Tpermohonan;
use Illuminate\Http\Request;
use App\Models\T_pendaftaran;
use Illuminate\Support\Facades\DB;

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

        $poli = M_poli::get()->map(function ($item) {
            $item->jumlah = T_pendaftaran::where('tglDaftar', Carbon::now()->format('d-m-Y'))->where('kdPoli', $item->kdPoli)->count();
            return $item;
        });

        $nmPoli = $poli->pluck('nmPoli');
        $jmlPasien = $poli->pluck('jumlah');
        $top10 = DB::table('t_diagnosa')
            ->select('m_diagnosa_id', DB::raw('count(*) as value'))
            ->groupBy('m_diagnosa_id')
            ->orderBy('value', 'DESC')->take(10)->get()->map(function ($item) {
                $color = sprintf("#%06x", rand(0, 16777215));
                $item->color = $color;
                $item->highlight = $color;
                $item->label = M_diagnosa::find($item->m_diagnosa_id)->nmDiag;
                return $item;
            });

        return view('admin.home', compact('totalPasien', 'pasienHariIni', 'pasienMingguIni', 'pasienBulanIni', 'nmPoli', 'jmlPasien', 'top10'));
    }

    public function pemohon()
    {
        $permohonan = Tpermohonan::orderBy('id', 'DESC')->get();
        return view('pemohon.home', compact('permohonan'));
    }
}

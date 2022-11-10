<?php

namespace App\Http\Controllers;

use App\Models\M_status_pulang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusPulangController extends Controller
{
    public function index()
    {
        $data = M_status_pulang::paginate(15);
        $dataPcare = null;
        
        return view('admin.data.statuspulang.index', compact('data', 'dataPcare'));
    }

    public function getStatusPulang()
    {
        try {
            $service = WSStatusPulang('GET', true);

            if ($service == null) {
                Session::flash('info', 'Data Tidak Ditemukan');
                return back();
            } else {
                $dataPcare = $service;

                $data = M_status_pulang::paginate(15);
                Session::flash('success', $dataPcare->count . ' Data Ditemukan Dan Disimpan Di DB Lokal');
                return view('admin.data.statuspulang.index', compact('data', 'dataPcare'));
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Gagal Connect, Coba Lagi');

            return back();
        }
    }
}

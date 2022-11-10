<?php

namespace App\Http\Controllers;

use App\Models\M_dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index()
    {
        $data = M_dokter::paginate(15);
        $dataPcare = null;
        return view('admin.data.dokter.index', compact('data', 'dataPcare'));
    }

    public function getDokter()
    {
        try {
            $service = WSDokter('GET', 0, 100);

            if ($service == null) {
                Session::flash('info', 'Data Tidak Ditemukan');
                return back();
            } else {
                $dataPcare = $service;
                $data = M_dokter::paginate(15);

                Session::flash('success', $dataPcare->count . ' Data Ditemukan Dan Disimpan Di DB Lokal');
                return view('admin.data.dokter.index', compact('data', 'dataPcare'));
            }
        } catch (\Exception $e) {
            dd($e);
            Session::flash('error', 'Gagal Connect, Coba Lagi');

            return back();
        }
    }
}

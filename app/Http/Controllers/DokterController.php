<?php

namespace App\Http\Controllers;

use App\Models\M_dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DokterController extends Controller
{
    public function index()
    {
        $data = M_dokter::orderBy('id', 'DESC')->paginate(15);
        $dataPcare = null;
        return view('admin.data.dokter.index', compact('data', 'dataPcare'));
    }

    public function store(Request $req)
    {
        $checkKode = M_dokter::where('kdDokter', $req->kdDokter)->first();
        if ($checkKode == null) {
            M_dokter::create($req->all());
            Session::flash('success', 'Berhasil Di Simpan');
            return back();
        } else {
            Session::flash('error', 'Kode Dokter Sudah Ada');
            return back();
        }
    }


    public function update(Request $req)
    {
        M_dokter::find($req->dokter_id)->update([
            'kdDokter' => $req->kdDokter,
            'nmDokter' => $req->nmDokter
        ]);
        Session::flash('success', 'Berhasil Di Update');
        return back();
    }

    public function delete($id)
    {
        M_dokter::find($id)->delete()
        Session::flash('success', 'Berhasil Di Hapus');
        return back();
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

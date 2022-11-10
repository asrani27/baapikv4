<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\M_poli;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;
use App\Models\T_pendaftaran;
use App\Models\M_status_pulang;
use Illuminate\Support\Facades\Session;

class PelayananController extends Controller
{
    public function index()
    {
        $data = T_pendaftaran::where('ke_poli', 1)->orderBy('id', 'DESC')->paginate(15);
        $poli = M_poli::get();
        return view('admin.pelayanan.index', compact('data', 'poli'));
    }

    public function updateStatusPulang(Request $req, $id)
    {
        T_pelayanan::find($id)->update(['kdStatusPulang' => $req->kdStatusPulang]);
        Session::flash('success', 'Status Pulang di update');
        return back();
    }

    public function periksa($id)
    {
        $data = T_pelayanan::find($id);

        $statusPulang = M_status_pulang::get();
        $riwayat = $data->pasien->riwayat;
        $riwayat->map(function ($item) {
            $item->anamnesa = $item->anamnesa;
            $item->diagnosa = $item->diagnosa;
            $item->resep = $item->resep;
            $item->tindakan = $item->tindakan;
            return $item;
        });

        return view('admin.pelayanan.periksa', compact('data', 'statusPulang', 'id', 'riwayat'));
    }

    public function filter()
    {
        $tgl = Carbon::parse(request()->tanggal)->format('d-m-Y');
        $kdPoli = request()->kdPoli;

        if ($kdPoli == null) {
            $data = T_pendaftaran::where('tglDaftar', $tgl)->where('ke_poli', 1)->orderBy('id', 'DESC')->paginate(15);
        } else {
            $data = T_pendaftaran::where('tglDaftar', $tgl)->where('kdPoli', $kdPoli)->where('ke_poli', 1)->orderBy('id', 'DESC')->paginate(15);
        }
        $poli = M_poli::get();
        request()->flash();
        return view('admin.pelayanan.index', compact('data', 'poli'));
    }
}

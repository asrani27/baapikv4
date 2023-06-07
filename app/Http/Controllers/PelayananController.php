<?php

namespace App\Http\Controllers;

use App\Models\M_diagnosa;
use Carbon\Carbon;
use App\Models\M_poli;
use App\Models\T_pelayanan;
use App\Models\T_pendaftaran;
use App\Models\M_status_pulang;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PelayananController extends Controller
{
    public function index()
    {
        $data = T_pelayanan::where('ke_poli', 1)->orderBy('id', 'DESC')->paginate(15);

        $data->getCollection()->transform(function ($item) {
            $item->status_pulang = M_status_pulang::where('kdStatusPulang', $item->kdStatusPulang)->first();
            return $item;
        });

        $poli = M_poli::get();
        return view('admin.pelayanan.index', compact('data', 'poli'));
    }

    public function updateStatusPulang(Request $req, $id)
    {
        T_pelayanan::find($id)->update([
            'kdStatusPulang' => $req->kdStatusPulang,
            'status' => 'Sudah dilayani'
        ]);
        Session::flash('success', 'Status Pulang di update');
        return back();
    }

    public function periksa($id)
    {
        $data = T_pelayanan::find($id);

        $statusPulang = M_status_pulang::get();
        if ($data->pasien == null) {
            $riwayat = [];
        } else {
            $riwayat = $data->pasien->riwayat;
            $riwayat->map(function ($item) {
                $item->anamnesa = $item->anamnesa;
                $item->diagnosa = $item->diagnosa;
                $item->resep = $item->resep;
                $item->tindakan = $item->tindakan;
                return $item;
            });
        }

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

    public function getDiagnosa(Request $req)
    {
        if ($req->searchTerm == null) {
            $data = null;
        } else {
            $data = M_diagnosa::where('nmDiag', 'LIKE', '%' . $req->searchTerm . '%')->orWhere('kdDiag', 'LIKE', '%' . $req->searchTerm . '%')->get()->take(10)->toArray();
            return json_encode($data);
        }
    }
}

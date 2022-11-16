<?php

namespace App\Http\Controllers;

use App\Models\M_tindakan;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;
use App\Models\M_status_pulang;
use App\Models\T_tindakan;
use Illuminate\Support\Facades\Session;

class TindakanController extends Controller
{
    public function indexD($id)
    {
        $data = T_pelayanan::find($id);
        $statusPulang = M_status_pulang::get();
        $riwayat = T_pelayanan::where('nik', $data->nik)->get();
        $tindakan = M_tindakan::get();
        return view('admin.pelayanan.tindakan.index', compact('data', 'statusPulang', 'id', 'riwayat', 'tindakan'));
    }

    public function index()
    {
        $data = M_tindakan::orderBy('id', 'DESC')->paginate(15);
        $dataPcare = null;

        return view('admin.data.tindakan.index', compact('data', 'dataPcare'));
    }
    public function store(Request $req)
    {
        $checkKode = M_tindakan::where('kdTindakan', $req->kdTindakan)->first();
        if ($checkKode == null) {
            M_tindakan::create($req->all());
            Session::flash('success', 'Berhasil Di Simpan');
            return back();
        } else {
            Session::flash('error', 'Kode Dokter Sudah Ada');
            return back();
        }
    }


    public function update(Request $req)
    {
        M_tindakan::find($req->tindakan_id)->update([
            'kdTindakan' => $req->kdTindakan,
            'nmTindakan' => $req->nmTindakan,
            'maxTarif' => $req->maxTarif,
        ]);
        Session::flash('success', 'Berhasil Di Update');
        return back();
    }

    public function delete($id)
    {
        M_tindakan::find($id)->delete();
        Session::flash('success', 'Berhasil Di Hapus');
        return back();
    }

    public function storeD(Request $req, $id)
    {
        $attr = $req->all();
        $attr['t_pendaftaran_id'] = $id;
        $attr['m_tindakan_id'] = M_tindakan::where('kdTindakan', $req->kdTindakan)->first()->id;

        T_tindakan::create($attr);
        Session::flash('success', 'Data Di Simpan');
        return back();
    }
    public function deleteD($id, $id_tindakan)
    {
        T_tindakan::find($id_tindakan)->delete();
        Session::flash('success', 'Data Di hapus');
        return back();
    }
}

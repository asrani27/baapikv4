<?php

namespace App\Http\Controllers;

use App\Models\M_obat;
use App\Models\T_resep;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;
use App\Models\M_status_pulang;
use Illuminate\Support\Facades\Session;

class ResepController extends Controller
{
    public function index($id)
    {
        $data = T_pelayanan::find($id);
        $statusPulang = M_status_pulang::get();
        $riwayat = T_pelayanan::where('nik', $data->nik)->get();
        $obat = M_obat::get();
        return view('admin.pelayanan.resep.index', compact('data', 'statusPulang', 'id', 'riwayat', 'obat'));
    }

    public function store(Request $req, $id)
    {
        $attr = $req->all();
        $attr['t_pendaftaran_id'] = $id;
        $attr['m_obat_id'] = $req->obat_id;
        $attr['kode'] = M_obat::find($req->obat_id)->kode;
        $attr['nama'] = M_obat::find($req->obat_id)->nama;
        T_resep::create($attr);
        Session::flash('success', 'Data Di Simpan');
        return back();
    }

    public function delete($id, $id_resep)
    {
        T_resep::find($id_resep)->delete();
        Session::flash('success', 'Data Di hapus');
        return back();
    }
}

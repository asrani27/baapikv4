<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\M_dokter;
use App\Models\T_anamnesa;
use App\Models\M_kesadaran;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;
use App\Models\M_status_pulang;
use Illuminate\Support\Facades\Session;

class AnamnesaController extends Controller
{
    public function index($id)
    {
        $data = T_pelayanan::find($id);
        $statusPulang = M_status_pulang::get();
        $riwayat = T_pelayanan::where('nik', $data->nik)->get();
        $tm1 = M_dokter::get();
        $kesadaran = M_kesadaran::get();
        if ($data->anamnesa == null) {
            //create
            return view('admin.pelayanan.anamnesa.index', compact('data', 'statusPulang', 'id', 'riwayat', 'tm1', 'kesadaran'));
        } else {
            //edit
            $data = $data;

            return view('admin.pelayanan.anamnesa.edit', compact('data', 'statusPulang', 'id', 'riwayat', 'tm1', 'kesadaran'));
        }
    }

    public function store(Request $req, $id)
    {

        $attr = $req->all();
        $attr['tanggalPulang'] = Carbon::now();
        $attr['t_pendaftaran_id'] = $id;
        $attr['m_dokter_id'] = M_dokter::where('kdDokter', $req->kdDokter1)->first()->id;
        $attr['m_kesadaran_id'] = M_kesadaran::where('kdSadar', $req->kdSadar)->first()->id;

        T_anamnesa::create($attr);

        Session::flash('success', 'Anamnesa Berhasil Disimpan');
        return redirect('/superadmin/pelayanan/periksa/' . $id . '/anamnesa');
    }
    public function update(Request $req, $id, $id_anamnesa)
    {

        $attr = $req->all();
        $attr['tanggalPulang'] = Carbon::now();
        $attr['t_pendaftaran_id'] = $id;
        $attr['m_dokter_id'] = M_dokter::where('kdDokter', $req->kdDokter1)->first()->id;
        $attr['m_kesadaran_id'] = M_kesadaran::where('kdSadar', $req->kdSadar)->first()->id;

        T_anamnesa::find($id_anamnesa)->update($attr);

        Session::flash('success', 'Anamnesa Berhasil Diupdate');
        return redirect('/superadmin/pelayanan/periksa/' . $id . '/anamnesa');
    }
}

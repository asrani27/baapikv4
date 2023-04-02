<?php

namespace App\Http\Controllers;

use App\Models\M_diagnosa;
use App\Models\M_status_pulang;
use App\Models\Mdiagnosa;
use App\Models\T_diagnosa;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DiagnosaController extends Controller
{

    public function index()
    {
        $data = M_diagnosa::paginate(15);
        $dataPcare = null;
        return view('admin.data.diagnosa.index', compact('data', 'dataPcare'));
    }

    public function store(Request $req)
    {
        foreach ($req->kdDiag as $key => $item) {
            $check = M_diagnosa::where('kdDiag', $item)->first();
            if ($check == null) {
                $n = new M_diagnosa;
                $n->kdDiag = $item;
                $n->nmDiag = $req->nmDiag[$key];
                $n->save();
            }
        }
        Session::flash('success', 'Data Berhasil Disimpan');
        return redirect('/superadmin/data/diagnosa/');
    }

    public function indexD($id)
    {
        $data = T_pelayanan::find($id);
        $statusPulang = M_status_pulang::get();
        $riwayat = T_pelayanan::where('nik', $data->nik)->get();
        $diag = M_diagnosa::get();
        return view('admin.pelayanan.diagnosa.index', compact('data', 'statusPulang', 'id', 'riwayat', 'diag'));
    }
    public function storeD(Request $req, $id)
    {
        $attr = $req->all();
        $attr['t_pendaftaran_id'] = $id;
        $attr['m_diagnosa_id'] = M_diagnosa::where('kdDiag', $req->kdDiag)->first()->id;
        T_diagnosa::create($attr);
        Session::flash('success', 'Data Di Simpan');
        return back();
    }
    public function cari()
    {
        $keyword = request()->get('cari');
        $data = M_diagnosa::where('kdDiag', 'LIKE', '%' . $keyword . '%')->orWhere('nmDiag', 'LIKE', '%' . $keyword . '%')->paginate(15);
        request()->flash();
        $dataPcare = null;
        return view('admin.data.diagnosa.index', compact('data', 'dataPcare'));
    }

    public function getDiagnosa()
    {
        try {
            $keyword = request()->get('caripcare');
            $service = WSDiagnosa('GET', $keyword = null ? '' : $keyword, 0, 10000);

            if ($service == null) {
                Session::flash('info', 'Data Tidak Di temukan');
                request()->flash();
                return back();
            } else {
                $data = M_diagnosa::paginate(15);
                $dataPcare = $service;

                request()->flash();
                Session::flash('success', 'Data Di temukan');
                return view('admin.data.diagnosa.index', compact('dataPcare', 'data'));
            }
        } catch (\Exception $e) {
            $message = json_decode((string)$e->getResponse()->getBody())->metaData->message;

            Session::flash('error', $message);
            return back();
        }
    }

    public function delete($id, $id_diagnosa)
    {
        T_diagnosa::find($id_diagnosa)->delete();
        Session::flash('success', 'Data Di hapus');
        return back();
    }
}

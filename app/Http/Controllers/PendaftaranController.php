<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\M_poli;
use Illuminate\Http\Request;
use App\Models\T_pendaftaran;
use Illuminate\Support\Facades\Session;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = T_pendaftaran::orderBy('id', 'DESC')->paginate(15);
        $poli = M_poli::get();
        return view('admin.pendaftaran.index', compact('data', 'poli'));
    }
    public function filter()
    {
        $tgl = Carbon::parse(request()->tanggal)->format('d-m-Y');
        $kdPoli = request()->kdPoli;

        if ($kdPoli == null) {
            $data = T_pendaftaran::where('tglDaftar', $tgl)->orderBy('id', 'DESC')->paginate(15);
        } else {
            $data = T_pendaftaran::where('tglDaftar', $tgl)->where('kdPoli', $kdPoli)->orderBy('id', 'DESC')->paginate(15);
        }
        $poli = M_poli::get();
        request()->flash();
        return view('admin.pendaftaran.index', compact('data', 'poli'));
    }

    public function kepoli($id)
    {
        T_pendaftaran::find($id)->update(['ke_poli' => 1]);
        Session::flash('success', 'Berhasil Di kirim ke poli');
        return back();
    }

    public function delete($id)
    {
        T_pendaftaran::find($id)->delete();
        Session::flash('success', 'Berhasil Di Hapus');
        return back();
    }
}

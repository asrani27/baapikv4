<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\M_poli;
use App\Models\M_pasien;
use App\Models\T_pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    public function index()
    {
        $data = M_pasien::orderBy('id', 'DESC')->paginate(15);
        return view('admin.pasien.index', compact('data'));
    }

    public function add()
    {
        $data = null;
        return view('admin.pasien.add', compact('data'));
    }

    public function edit($id)
    {
        $data = M_pasien::find($id);
        return view('admin.pasien.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {

        $attr = $req->all();

        M_pasien::find($id)->update($attr);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/pasien');
    }
    public function store(Request $req)
    {
        if ($req->check != null) {
            try {
                if (Str::length($req->noKartu) == 13) {
                    //no kartu
                    $response = WSCheckNomor('GET', $req->noKartu);
                } else {
                    //nik
                    $response = WSCheckNomorByNik('GET', $req->noKartu);
                }
                $data = $response;

                $req->flash();
                if ($data == null) {
                    Session::flash('info', 'Data Tidak Di temukan');
                    return view('admin.pasien.add', compact('data'));
                } else {
                    Session::flash('success', 'Data Di temukan');
                    return view('admin.pasien.add', compact('data'));
                }
            } catch (\Exception $e) {
                if ($e->getResponse()->getStatusCode() == 400) {
                    Session::flash('error', 'Gagal Bridging, Silahkan Check Akun Bridging');
                    return back();
                }

                if (Auth::user()->mode == 1) {
                    $message = json_decode((string)$e->getResponse()->getBody())->response[0]->message;
                } else {
                    $message = json_decode((string)$e->getResponse()->getBody())->response->message;
                }
                Session::flash('error', $message);
                return back();
            }
        } else {
            //simpan data
            $attr = $req->all();

            M_pasien::create($attr);
            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/pasien');
        }
    }

    public function delete($id)
    {
        M_pasien::find($id)->delete();
        Session::flash('success', 'Berhasil Di Hapus');
        return back();
    }

    public function daftarUmum($id)
    {
        $data = M_pasien::find($id);
        $poli = M_poli::get();
        return view('admin.pasien.umum', compact('data', 'id', 'poli'));
    }
    public function daftarBpjs($id)
    {
        $data = M_pasien::find($id);
        $poli = M_poli::get();
        return view('admin.pasien.bpjs', compact('data', 'id', 'poli'));
    }

    public function storeDaftarUmum(Request $req, $id)
    {
        $pasien = M_pasien::find($id);
        $poli = M_poli::where('kdPoli', $req->kdPoli)->first();
        DB::beginTransaction();
        try {
            $db = T_pendaftaran::where('tglDaftar', Carbon::parse($req->tglDaftar)->format('d-m-Y'))->where('kdPoli', $req->kdPoli)->get();
            if ($db->count() == 0) {
                $antrian = antrean(1);
            } else {
                $antrian = antrean((int)$db->last()->nomor_antrian + 1);
            }
            //dd($pasien);
            // simpan ke pendaftaran;
            $n = new T_pendaftaran;
            $n->tglDaftar = Carbon::parse($req->tglDaftar)->format('d-m-Y');
            $n->kdProviderPeserta = $pasien->kdProviderPeserta;
            $n->kunjSakit         = $pasien->kunjSakit;
            $n->kdTkp             = $pasien->kdTkp;
            $n->noKartu           = $pasien->noKartu;
            $n->nik               = $pasien->nik;
            $n->nama              = $pasien->nama;
            $n->sex               = $pasien->sex;
            $n->tglLahir          = $pasien->tglLahir;
            $n->m_pasien_id       = $pasien->id;
            $n->kdPoli            = $poli->kdPoli;
            $n->nmPoli            = $poli->nmPoli;
            $n->kunjSakit         = $poli->poliSakit;
            $n->jenis             = 'UMUM';
            $n->daftarVia         = 'offline';
            $n->nomor_antrian     = $antrian;
            $n->save();

            DB::commit();
            Session::flash('success', 'Berhasil Daftar');
            return redirect('/superadmin/pendaftaran');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            Session::flash('error', 'Gagal Daftar');
            return back();
        }
    }
    public function storeDaftarBpjs(Request $req, $id)
    {
        $pasien = M_pasien::find($id);
        $poli = M_poli::where('kdPoli', $req->kdPoli)->first();
        DB::beginTransaction();
        try {
            $db = T_pendaftaran::where('tglDaftar', Carbon::parse($req->tglDaftar)->format('d-m-Y'))->where('kdPoli', $req->kdPoli)->get();

            if ($db->count() == 0) {
                $antrian = antrean(1);
            } else {
                $antrian = antrean((int)$db->last()->nomor_antrian + 1);
            }

            // simpan ke pendaftaran;
            $n = new T_pendaftaran;
            $n->tglDaftar = Carbon::parse($req->tglDaftar)->format('d-m-Y');
            $n->kdProviderPeserta = $pasien->kdProviderPeserta;
            $n->kunjSakit         = $pasien->kunjSakit;
            $n->kdTkp             = $pasien->kdTkp;
            $n->noKartu           = $pasien->noKartu;
            $n->nik               = $pasien->nik;
            $n->nama              = $pasien->nama;
            $n->sex               = $pasien->sex;
            $n->tglLahir          = $pasien->tglLahir;
            $n->m_pasien_id       = $pasien->id;
            $n->kdPoli            = $poli->kdPoli;
            $n->nmPoli            = $poli->nmPoli;
            $n->kunjSakit         = $poli->poliSakit;
            $n->jenis             = 'BPJS';
            $n->daftarVia         = 'offline';
            $n->nomor_antrian     = $antrian;
            $n->save();

            DB::commit();
            Session::flash('success', 'Berhasil Daftar');
            return redirect('/superadmin/pendaftaran');
        } catch (\Exception $e) {

            DB::rollback();
            Session::flash('error', 'Gagal Daftar');
            return back();
        }
    }
    public function cari()
    {
        $keyword = request()->get('cari');
        $data = M_pasien::where('nik', 'LIKE', '%' . $keyword . '%')->orWhere('nama', 'LIKE', '%' . $keyword . '%')->paginate(15);
        request()->flash();
        return view('admin.pasien.index', compact('data'));
    }
}

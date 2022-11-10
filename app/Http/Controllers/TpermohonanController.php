<?php

namespace App\Http\Controllers;

use App\Models\Tpermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TpermohonanController extends Controller
{
    public function store(Request $req)
    {
        dd(Auth::user());
        $attr = $req->all();
        $attr['pemohon_id'] = $this->user()->skpd->id;

        Tpermohonan::create($attr);
        Session::flash('success', 'Berhasil Di Simpan');
        return redirect('/pemohon');
    }
}

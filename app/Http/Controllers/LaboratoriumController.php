<?php

namespace App\Http\Controllers;

use App\Models\M_status_pulang;
use App\Models\T_pelayanan;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index($id)
    {
        $data = T_pelayanan::find($id);
        
        $statusPulang = M_status_pulang::get();
        $riwayat = T_pelayanan::where('nik', $data->nik)->get();
        return view('admin.pelayanan.laboratorium.index', compact('data', 'statusPulang', 'id', 'riwayat'));
    }
}

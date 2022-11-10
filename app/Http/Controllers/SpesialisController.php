<?php

namespace App\Http\Controllers;

use App\Models\M_spesialis;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    public function index()
    {
        $data = M_spesialis::paginate(15);
        $dataPcare = null;

        return view('admin.data.spesialis.index', compact('data', 'dataPcare'));
    }
}

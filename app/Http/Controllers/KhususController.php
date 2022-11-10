<?php

namespace App\Http\Controllers;

use App\Models\M_khusus;
use Illuminate\Http\Request;

class KhususController extends Controller
{
    public function index()
    {
        $data = M_khusus::paginate(15);
        $dataPcare = null;

        return view('admin.data.khusus.index', compact('data', 'dataPcare'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\M_sarana;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    public function index()
    {
        $data = M_sarana::paginate(15);
        $dataPcare = null;

        return view('admin.data.sarana.index', compact('data', 'dataPcare'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\M_kesadaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KesadaranController extends Controller
{
    public function index()
    {
        $data = M_kesadaran::paginate(15);
        return view('admin.data.kesadaran.index', compact('data'));
    }
    
    public function getKesadaran()
    {
        Session::flash('success', 'Data Di temukan Dan Disimpan Di DB Lokal');
        return back();
    }
}

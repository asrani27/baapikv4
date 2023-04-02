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
        $dataPcare = WSKesadaran();

        Session::flash('success', json_encode($dataPcare->metaData) . ' ' . json_encode($dataPcare->response));
        return back();
    }
}

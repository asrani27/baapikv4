<?php

namespace App\Http\Controllers;

use App\Models\M_provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProviderController extends Controller
{
    public function index()
    {
        $data = M_provider::paginate(15);
        return view('admin.data.provider.index', compact('data'));
    }
    public function getProvider()
    {
        Session::flash('success', 'Data Di temukan Dan Disimpan Di DB Lokal');
        return back();
    }
}

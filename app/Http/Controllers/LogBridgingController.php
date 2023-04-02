<?php

namespace App\Http\Controllers;

use App\Models\Log_bridging;
use Illuminate\Http\Request;

class LogBridgingController extends Controller
{
    public function index()
    {
        $data = Log_bridging::orderBy('id', 'DESC')->paginate(20);
        return view('admin.log.bridging.index', compact('data'));
    }
}

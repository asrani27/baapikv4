<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        Session::flash('info', 'Dalam Pengembangan');
        return back();
    }
}

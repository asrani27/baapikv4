<?php

namespace App\Http\Controllers;

use App\Models\ManualBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManualBookController extends Controller
{
    public function index()
    {
        $data = ManualBook::get();
        return view('admin.manualbook.index', compact('data'));
    }

    public function create()
    {
        return view('admin.manualbook.create');
    }

    public function edit($id)
    {
        $data = ManualBook::find($id);
        return view('admin.manualbook.edit', compact('data', 'id'));
    }

    public function store(Request $req)
    {
        ManualBook::create($req->all());
        Session::flash('success', 'Manual Book Disimpan');
        return redirect('/superadmin/manualbook');
    }

    public function update(Request $req, $id)
    {
        ManualBook::find($id)->update($req->all());
        Session::flash('success', 'Manual Book Diupdate');
        return redirect('/superadmin/manualbook');
    }
}

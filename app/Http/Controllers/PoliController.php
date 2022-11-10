<?php

namespace App\Http\Controllers;

use App\Models\M_poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PoliController extends Controller
{
    public function index()
    {
        $data = M_poli::paginate(15);
        return view('admin.data.poli.index', compact('data'));
    }

    public function getPoli()
    {
        try {
            $service = WSPoli('GET', 0, 100);

            if ($service == null) {
                Session::flash('info', 'Data Tidak Di temukan');
                request()->flash();
                return back();
            } else {
                foreach ($service->list as $item) {
                    $check = M_poli::where('kdPoli', $item->kdPoli)->first();
                    if ($check == null) {
                        $n = new M_poli;
                        $n->kdPoli = $item->kdPoli;
                        $n->nmPoli = $item->nmPoli;
                        $n->poliSakit = $item->poliSakit;
                        $n->save();
                    } else {
                    }
                }
                request()->flash();
                Session::flash('success', 'Data Di temukan Dan Disimpan Di DB Lokal');
                return back();
            }
        } catch (\Exception $e) {
            $message = json_decode((string)$e->getResponse()->getBody())->metaData->message;
            Session::flash('error', $message);
            return back();
        }
    }
}

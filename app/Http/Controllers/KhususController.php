<?php

namespace App\Http\Controllers;

use App\Models\M_khusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KhususController extends Controller
{
    public function index()
    {
        $data = M_khusus::paginate(15);
        $dataPcare = null;

        return view('admin.data.khusus.index', compact('data', 'dataPcare'));
    }

    public function getKhusus()
    {
        $service = WSKhusus();

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_khusus::where('kdKhusus', $item->kdKhusus)->first();
                if ($check == null) {
                    $n = new M_khusus;
                    $n->kdKhusus = $item->kdKhusus;
                    $n->nmKhusus = $item->nmKhusus;
                    $n->save();
                }
            }
            request()->flash();
            Session::flash('success', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        }
    }
}

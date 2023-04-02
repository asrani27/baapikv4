<?php

namespace App\Http\Controllers;

use App\Models\M_sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SaranaController extends Controller
{
    public function index()
    {
        $data = M_sarana::paginate(15);
        $dataPcare = null;

        return view('admin.data.sarana.index', compact('data', 'dataPcare'));
    }
    public function getSarana()
    {
        $service = WSSarana();

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_sarana::where('kdSarana', $item->kdSarana)->first();
                if ($check == null) {
                    $n = new M_sarana;
                    $n->kdSarana = $item->kdSarana;
                    $n->nmSarana = $item->nmSarana;
                    $n->save();
                }
            }
            request()->flash();
            Session::flash('success', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        }
    }
}

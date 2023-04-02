<?php

namespace App\Http\Controllers;

use App\Models\M_spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpesialisController extends Controller
{
    public function index()
    {
        $data = M_spesialis::paginate(15);
        $dataPcare = null;

        return view('admin.data.spesialis.index', compact('data', 'dataPcare'));
    }

    public function getSpesialis()
    {
        $service = WSSpesialis();

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_spesialis::where('kdSpesialis', $item->kdSpesialis)->first();
                if ($check == null) {
                    $n = new M_spesialis;
                    $n->kdSpesialis = $item->kdSpesialis;
                    $n->nmSpesialis = $item->nmSpesialis;
                    $n->save();
                } else {
                }
            }
            request()->flash();
            Session::flash('success', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        }
    }
}

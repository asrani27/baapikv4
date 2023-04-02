<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_sub_spesialis;
use Illuminate\Support\Facades\Session;

class SubSpesialisController extends Controller
{
    public function getSubSpesialis($id, $kdSpesialis)
    {

        $service = WSSubSpesialis('GET', $kdSpesialis);

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_sub_spesialis::where('kdSubSpesialis', $item->kdSubSpesialis)->first();
                if ($check == null) {
                    $n = new M_sub_spesialis;
                    $n->kdSubSpesialis = $item->kdSubSpesialis;
                    $n->nmSubSpesialis = $item->nmSubSpesialis;
                    $n->kdPoliRujuk = $item->kdPoliRujuk;
                    $n->spesialis_id = $id;
                    $n->save();
                } else {
                    $check->update(['spesialis_id' => $id]);
                }
            }
            request()->flash();
            Session::flash('success', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        }
    }
}

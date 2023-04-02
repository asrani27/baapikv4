<?php

namespace App\Http\Controllers;

use App\Models\M_status_pulang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StatusPulangController extends Controller
{
    public function index()
    {
        $data = M_status_pulang::paginate(15);
        $dataPcare = null;

        return view('admin.data.statuspulang.index', compact('data', 'dataPcare'));
    }

    public function getStatusPulangTrue()
    {
        $service = WSStatusPulang('GET', 'true');

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_status_pulang::where('kdStatusPulang', $item->kdStatusPulang)->first();
                if ($check == null) {
                    $n = new M_status_pulang;
                    $n->kdStatusPulang = $item->kdStatusPulang;
                    $n->nmStatusPulang = $item->nmStatusPulang;
                    $n->rawatInap = true;
                    $n->save();
                } else {
                }
            }
            request()->flash();
            Session::flash('success', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        }
    }
    public function getStatusPulangFalse()
    {
        $service = WSStatusPulang('GET', 'false');

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_status_pulang::where('kdStatusPulang', $item->kdStatusPulang)->first();
                if ($check == null) {
                    $n = new M_status_pulang;
                    $n->kdStatusPulang = $item->kdStatusPulang;
                    $n->nmStatusPulang = $item->nmStatusPulang;
                    $n->rawatInap = false;
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

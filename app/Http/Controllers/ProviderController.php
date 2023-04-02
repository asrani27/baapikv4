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
        $service = WSProvider();

        if ($service->response == null) {
            Session::flash('info', json_encode($service->metaData) . ' ' . json_encode($service->response));
            return back();
        } else {
            foreach ($service->response->list as $item) {
                $check = M_provider::where('kdProvider', $item->kdProvider)->first();
                if ($check == null) {
                    $n = new M_provider;
                    $n->kdProvider = $item->kdProvider;
                    $n->nmProvider = $item->nmProvider;
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

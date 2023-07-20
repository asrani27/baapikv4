<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function akunbridging()
    {
        $data = Auth::user();
        //dd($data);
        return view('admin.setting.akunbridging', compact('data'));
    }
    public function gantipassword()
    {
        return view('admin.setting.gantipassword');
    }

    public function updatepassword(Request $req)
    {
        if (Hash::check($req->password_lama, Auth::user()->password)) {
            if ($req->password1 != $req->password2) {
                Session::flash('warning', 'Password Baru Tidak Sama');
                return back();
            } else {
                Auth::user()->update([
                    'password' => bcrypt($req->password1)
                ]);
                Session::flash('success', 'Berhasil Di update');
                return back();
            }
        } else {
            Session::flash('warning', 'Password Lama Salah');
            return back();
        }
    }

    public function development(Request $req)
    {
        $u = Auth::user();
        $u->user_pcare_dev = $req->user_pcare_dev;
        $u->pass_pcare_dev = $req->pass_pcare_dev;
        $u->cons_id_dev = $req->cons_id_dev;
        $u->secret_key_dev = $req->secret_key_dev;
        $u->user_key = $req->user_key;
        $u->save();
        Session::flash('success', 'Berhasil Di update');
        return back();
    }
    public function developmentTesting()
    {
        $user = Auth::user();

        if ($user->cons_id_dev == null) {
            Session::flash('error', 'Cons ID Kosong');
            return back();
        }
        if ($user->secret_key_dev == null) {
            Session::flash('error', 'Secret key Kosong');
            return back();
        }
        if ($user->user_pcare_dev == null) {
            Session::flash('error', 'User Pcare Kosong');
            return back();
        }
        if ($user->pass_pcare_dev == null) {
            Session::flash('error', 'Pass Pcare Kosong');
            return back();
        }
        if ($user->user_key == null) {
            Session::flash('error', 'User Key Kosong');
            return back();
        }

        $data = WSDiagnosa('GET', 'A00', 0, 10);

        try {
            $data = WSDiagnosa('GET', 'A00', 0, 10);
            dd($data);
            Auth::user()->update(['is_connect' => 1]);
            Session::flash('success', 'Connection Success');
            return back();
        } catch (\Exception $e) {
            $message = json_decode((string)$e->getResponse()->getBody())->metaData->message;

            Session::flash('error', $message);

            Auth::user()->update(['is_connect' => 0]);

            return back();
        }
    }
}

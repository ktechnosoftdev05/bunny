<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyDeviceController extends Controller
{
    public function verifyDevice(Request $request)
    {
//        Mail::to($email)->send();
//        if($sentCode == $recievedCode)
//        {
//            return view('admin.dashboard');
//        }
        return view('admin.auth.verify-device');
    }
}

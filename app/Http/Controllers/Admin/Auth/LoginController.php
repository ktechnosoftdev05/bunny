<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminSystemInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AdminSystemInfoHelper;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admins for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest-admin:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if(Auth::guard('admin')->attempt($credentials,$remember))
        {
            $adminId = Auth::guard('admin')->id();
            $systemInfo = $this->getAdminSystemInfo();
            // Check if IP Already Exists or not.
            $ipDoesntExist =  AdminSystemInfo::where('ip',$systemInfo['ip'])->doesntExist();
            // Insert ip,device & browser to table if admin logs in with different IP Address.
            if($ipDoesntExist)
            {
                AdminSystemInfo::create([
                    'admin_id' => $adminId,
                    'ip'       => $systemInfo['ip'],
                    'device'   => $systemInfo['device'],
                    'browser'  => $systemInfo['browser']
                ]);
            }
            return redirect()->route('admin.dashboard');
        }

        else
        {
            throw ValidationException::withMessages([
                $this->username() => [trans('email or password is wrong')],
            ]);
        }
    }
    // gets Admin System info like browser,device,ip.
    public function getAdminSystemInfo()
    {
        $getIp      = AdminSystemInfoHelper::get_ip();
        $getDevice  = AdminSystemInfoHelper::get_device();
        $getBrowser = AdminSystemInfoHelper::get_browsers();
        return $system = [
            'ip'     => $getIp,
            'device' => $getDevice,
            'browser'=> $getBrowser
        ];
    }
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string|min:8',
        ]);
    }
    public function username()
    {
        return 'email';
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('admin.login');
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}

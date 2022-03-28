<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Medic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use DB;
use Session;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:medic')->except('logout');
    }


    public function login(Request $request)
    {
        $mid = $request->input('username');
        $request['password'] = bcrypt($request->input('password'));
        $credentials = [
            'm_id' => $request->input('username'),
            'password' => $request->input('password')
        ];
        $val = $request->only('m_id', 'password');
        $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();
        

        if (Auth::guard('medic')->attempt($credentials)) {
            return view("admin.dashboard",compact('userinfo'));
        }else{
            dd(Auth::guard('medic')->attempt($credentials));
            // echo bcrypt($request->input('password'));
            // return view("admin.dashboard",compact('userinfo'));
        }
       
    }

    public function logout(Request $request) {
        Session::flush();
        Auth::guard('medic')->logout();
        return redirect('/login');
      }
}

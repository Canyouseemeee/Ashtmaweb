<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medic;
use Auth;
use DB;




class DashboardController extends Controller
{
    
    public function index(){
        if(Auth::guard('medic')->check()){
            $mid = Auth::guard('medic')->user()->m_id;
            $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();
            return view('admin.dashboard',compact('userinfo'));

        }else{
            return redirect('login');
        }
        return redirect('login');
    }

    
}

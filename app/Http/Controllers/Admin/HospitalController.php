<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index(){
        if(Auth::guard('medic')->check()){
            $mid = Auth::guard('medic')->user()->m_id;
            $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();

            $hospital = DB::table('hospital')
            ->select('*')
            ->get();
            
            return view('admin.hospital.hospital',compact(['userinfo','hospital']));
        }else{
            return redirect('login');
        } 
        
    }
}

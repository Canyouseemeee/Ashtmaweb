<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medic;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsermgController extends Controller
{
    public function index(){
        if(Auth::guard('medic')->check()){
            $mid = Auth::guard('medic')->user()->m_id;
            $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();

            $user = DB::table('medic')
            ->select('*')
            ->join('hospital', 'hospital.h_id', '=', 'medic.h_id')
            ->get();
            
            return view('admin.usermanagement.usermanage',compact(['userinfo','user']));
        }else{
            return redirect('login');
        } 
        
    }

    public function adduser(){
        $mid = Auth::guard('medic')->user()->m_id;
        $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();
        $hpt = DB::table('hospital')
            ->select('*')
            ->get();

        return view('admin.usermanagement.adduser',compact(['userinfo','hpt']));
        
    }

    public function add_user(Request $request){
        $medic = new Medic;
        $m_id = random_int(00000, 99999);
        $medic->m_id = "B".$m_id;
        $pname = $request->input('pname');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $medic->m_fullname =  $pname."".$name." ".$surname ;
        $medic->password = Hash::make($request->input('password'));
        $medic->h_id = $request->input('h_id');
        $medic->m_startdate = $request->input('fromdate');
        $medic->m_enddate = $request->input('todate');
        $medic->m_position = $request->input('m_position');

     
        if ($request->hasFile('Image')) {
            $filename = $request->Image->getClientOriginalName();
            $file = time() . '.' . $filename;
            $medic->m_image = $request->Image->storeAs('imagesprofile', $file, 'public');
            // dd($file);
        } else {
            $medic->m_image = null;
        }
        // echo($medic);
        $medic->save();

        return redirect('/usermanagement')->with('status','Your add user Success');
    }

    public function edituser(Request $request, $id){
        $mid = Auth::guard('medic')->user()->m_id;
        $userinfo = DB::table('medic')
            ->select('*')
            ->where('m_id', $mid)
            ->first();
        $hpt = DB::table('hospital')
            ->select('*')
            ->get();
        $medic = Medic::findOrFail($id);

        $find = DB::table('medic')
        ->select('h_name')
        ->join('hospital', 'hospital.h_id', '=', 'medic.h_id')
        ->where('medic.m_id', $medic->m_id)
        ->groupBy('h_name')
        ->get();


        return view('admin.usermanagement.edituser',
        compact([
            'userinfo',
            'hpt',
            'medic',
            'find',
        ]));
        
    }

    public function update_user(Request $request, $id){
        $medic = Medic::find($id);
        
        $medic->m_fullname =  $request->input('fullname') ;
        $medic->password = Hash::make($request->input('password'));
        $medic->h_id = $request->input('h_id');
        $medic->m_startdate = $request->input('fromdate');
        $medic->m_enddate = $request->input('todate');
        $medic->m_position = $request->input('m_position');
        // echo $medic->m_position;

     
        if ($request->hasFile('Image')) {
            $filename = $request->Image->getClientOriginalName();
            $file = time() . '.' . $filename;
            $medic->m_image = $request->Image->storeAs('imagesprofile', $file, 'public');
            // dd($file);
        } else {
            $medic->m_image = $medic->m_image;
        }
        // // echo($medic);
        $medic->update();

        return redirect('/usermanagement')->with('status','Your update user Success');
    }
}

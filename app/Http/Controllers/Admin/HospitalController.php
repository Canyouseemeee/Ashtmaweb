<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Hospital;

class HospitalController extends Controller
{

    public function index(){
        if(Auth::check()){
            
            $hospital = DB::table('hospital')
            ->select('*')
            ->get();
            
            return view('admin.hpt.hospitals',compact(['hospital']));
        }else{
            return redirect('login');
        } 
        
    }

    public function add_hospital(Request $request){
        $hpt = new Hospital;

        $hpt->h_name = $request->input('h_name');
        $hpt->h_tel = $request->input('h_tel');
        $hpt->updated_at = now();
        $hpt->created_at = now();

        
        // echo($medic);
        $hpt->save();

        return redirect()->back();
    }

    public function findhid(Request $request, $id){
        $hpt = Hospital::findOrFail($id);

        $data = DB::table('hospital')
        ->select('*')
        ->where('hospital.h_id', $hpt->h_id)
        ->get();

        return response()->json($data);
    }

    public function edit_hospital(Request $request){
        
        $h_id = $request->input('h_id');
        $h_name2 = $request->input('h_name2');
        $h_tel2 = $request->input('h_tel2');

        $hpt = Hospital::find($h_id);
        $hpt->h_name = $h_name2;
        $hpt->h_tel = $h_tel2;
        $hpt->updated_at = now();

        $hpt->update();

        return response()->json($hpt);
    }
}

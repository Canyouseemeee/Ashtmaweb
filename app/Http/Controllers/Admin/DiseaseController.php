<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Disease;

class DiseaseController extends Controller
{
    public function index(){
        if(Auth::check()){
            
            $disease = DB::table('disease')
            ->select('*')
            ->get();
            
            return view('admin.disease.diseases',compact(['disease']));
        }else{
            return redirect('login');
        } 
        
    }

    public function add_disease(Request $request){
        $disease = new Disease;

        $disease->d_name = $request->input('d_name');
        $disease->updated_at = now();
        $disease->created_at = now();

        
        // echo($medic);
        $disease->save();

        return redirect()->back();
    }

    public function finddid(Request $request, $id){
        $disease = Disease::findOrFail($id);

        $data = DB::table('disease')
        ->select('*')
        ->where('disease.d_id', $disease->d_id)
        ->get();

        return response()->json($data);
    }

    public function edit_disease(Request $request){
        
        $d_id = $request->input('d_id');
        $d_name2 = $request->input('d_name2');

        $disease = Disease::find($d_id);
        $disease->d_name = $d_name2;
        $disease->updated_at = now();

        // echo $request->input('h_id');
        // echo $request->input('h_name2');
        // echo $request->input('h_tel2');


        // echo($medic);
        $disease->update();

        return response()->json($disease);
    }
}

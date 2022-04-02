<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index(){
        if(Auth::check()){
            
            $medicine = DB::table('medicine')
            ->select('*')
            ->get();
            
            return view('admin.medicine.medicines',compact(['medicine']));
        }else{
            return redirect('login');
        } 
        
    }

    public function add_medicine(Request $request){
        
        $me_name = $request->input('me_name');
        $me_dose = $request->input('me_dose');
        $me_time = $request->input('me_time');
        $me_day = $request->input('me_day');
        $me_type = $request->input('me_type');

        if($request->has('me_when0') && !$request->has('me_when1')){
            $me_when = 0;
        }elseif($request->has('me_when1') && !$request->has('me_when0')){
            $me_when = 1;
        }elseif($request->has('me_when0') && $request->has('me_when1')){
            $me_when = 2;
        }

        $medicine = new Medicine;
        $medicine->me_name = $me_name;
        $medicine->me_dose = $me_dose;
        $medicine->me_time = $me_time;
        $medicine->me_day = $me_day;
        $medicine->me_type = $me_type;
        $medicine->me_when = $me_when;
        $medicine->created_at = now();
        $medicine->updated_at = now();

        if ($request->hasFile('Image')) {
            $filename = $request->Image->getClientOriginalName();
            $file = time() . '.' . $filename;
            $medicine->me_image = $request->Image->storeAs('imagesmedicine', $file, 'public');
            // dd($file);
        } else {
            $medicine->me_image = null;
        }
        // echo $medicine->me_image;

        $medicine->save();

        return response()->json($medicine);
    }

    public function findmeid(Request $request, $id){
        $medicine = Medicine::findOrFail($id);

        $data = DB::table('medicine')
        ->select('*')
        ->where('medicine.me_id', $medicine->me_id)
        ->get();

        return response()->json($data);
    }

    public function edit_medicine(Request $request){
        
        $me_id = $request->input('me_e_id');
        $me_name = $request->input('me_e_name');
        $me_dose = $request->input('me_e_dose');
        $me_time = $request->input('me_e_time');
        $me_day = $request->input('me_e_day');
        $me_type = $request->input('me_e_type');

        if($request->has('me_e_when0') && !$request->has('me_e_when1')){
            $me_when = 0;
        }elseif($request->has('me_e_when1') && !$request->has('me_e_when0')){
            $me_when = 1;
        }elseif($request->has('me_e_when0') && $request->has('me_e_when1')){
            $me_when = 2;
        }

        $medicine = Medicine::find($me_id);
        $medicine->me_name = $me_name;
        $medicine->me_dose = $me_dose;
        $medicine->me_time = $me_time;
        $medicine->me_day = $me_day;
        $medicine->me_type = $me_type;
        $medicine->me_when = $me_when;
        $medicine->updated_at = now();
        if ($request->hasFile('Image_e')) {
            $filename = $request->Image_e->getClientOriginalName();
            $file = time() . '.' . $filename;
            $medicine->me_image = $request->Image_e->storeAs('imagesmedicine', $file, 'public');
            // dd($file);
        } else {
            $medicine->me_image = $medicine->me_image;
        }
        $medicine->update();

        return response()->json($medicine);
    }
}

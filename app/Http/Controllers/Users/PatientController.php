<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB; 
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index(){
        
        $mid = Auth::guard('medic')->user()->m_id;
        $userinfo = DB::table('medic')
        ->select('*')
        ->where('m_id', $mid)
        ->first();

        $patient = DB::table('patient')
        ->select('*')
        ->join('hospital', 'hospital.h_id', '=', 'patient.h_id')
        ->join('disease', 'disease.d_id', '=', 'patient.d_id')
        ->get();
            
        return view('users.patient.patient',compact(['userinfo','patient']));
        
    }

    public function addpatient(){
        
        $mid = Auth::guard('medic')->user()->m_id;
        $userinfo = DB::table('medic')
        ->select('*')
        ->where('m_id', $mid)
        ->first();

        $hpt = DB::table('hospital')
            ->select('*')
            ->get();
        
        $disease = DB::table('disease')
            ->select('*')
            ->get();
            
        return view('users.patient.addpatient',compact(['userinfo','hpt','disease']));
        
    }

    public function add_patient(Request $request){
        $patient = new Patient;

        $hn_id = random_int(00000, 99999);
        $date = date('y');
        $patient->hn_id = $hn_id."/".$date;
        // echo $patient->hn_id;
        $patient->p_tname = $request->input('tname');
        $patient->p_name = $request->input('name');
        $patient->p_surname = $request->input('surname');
        $patient->p_etname = $request->input('etname');
        $patient->p_ename = $request->input('ename');
        $patient->p_esurname = $request->input('esurname');
        $patient->p_gender = $request->input('gender');
        $patient->p_birthdate = $request->input('birthdate');
        $patient->p_tel = $request->input('tel');
        $patient->p_race = $request->input('race');
        $patient->p_nationality = $request->input('nationality');
        $patient->p_religion = $request->input('religion');
        $patient->p_weight = $request->input('weight');
        $patient->p_height = $request->input('height');

        if ($request->hasFile('Image')) {
            $filename = $request->Image->getClientOriginalName();
            $file = time() . '.' . $filename;
            $patient->p_image = $request->Image->storeAs('imagesprofile', $file, 'public');
            // dd($file);
        } else {
            $patient->p_image = null;
        }

        $patient->d_id = $request->input('d_id');
        $patient->p_sysptom = $request->input('sysptom');
        $patient->p_passwordcode = Hash::make($request->input('passwordcode'));
        $patient->p_address = $request->input('address');
        $patient->h_id = $request->input('h_id');
        $patient->p_status = 0;
        $patient->u_id = 1;

           
        // echo($medic);
        $patient->save();

        return redirect('/patient')->with('status','Your add user Success');
    }
}

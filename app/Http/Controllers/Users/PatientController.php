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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $mid = Auth::user()->m_id;
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
        
        $mid = Auth::user()->m_id;
        

        $hpt = DB::table('hospital')
            ->select('*')
            ->get();
        
        $disease = DB::table('disease')
            ->select('*')
            ->get();

        $medicine = DB::table('medicine')
            ->select('*')
            ->get();
            
        return view('users.patient.addpatient',compact(['hpt','disease','medicine']));
        
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
        $patient->me_id = $request->input('me_id');
        $patient->p_status = 0;
        $patient->u_id = 1;

           
        // echo($medic);
        $patient->save();

        return redirect('/patient')->with('status','Your add user Success');
    }

    public function viewpatient(Request $request,$id){

        $patient = Patient::findOrFail($id);

        $find = DB::table('patient')
        ->select('h_name','d_name','me_name','medicine.me_id')
        ->join('hospital', 'hospital.h_id', '=', 'patient.h_id')
        ->join('disease', 'disease.d_id', '=', 'patient.d_id')
        ->join('medicine', 'medicine.me_id', '=', 'patient.me_id')
        ->where('patient.hn_id', $patient->hn_id)
        ->get();

        $hpt = DB::table('hospital')
            ->select('*')
            ->get();
        
        $disease = DB::table('disease')
            ->select('*')
            ->get();

        $medicine = DB::table('medicine')
            ->select('*')
            ->get();


        return view('users.patient.viewpatient',
        compact([
            'patient',
            'find',
            'hpt',
            'disease',
            'medicine',

        ]));

    }

    public function editpatient(Request $request,$id){
        

        $patient = Patient::findOrFail($id);

        $find = DB::table('patient')
        ->select('h_name','d_name','me_name')
        ->join('hospital', 'hospital.h_id', '=', 'patient.h_id')
        ->join('disease', 'disease.d_id', '=', 'patient.d_id')
        ->join('medicine', 'medicine.me_id', '=', 'patient.me_id')
        ->where('patient.hn_id', $patient->hn_id)
        ->get();

        $hpt = DB::table('hospital')
            ->select('*')
            ->get();
        
        $disease = DB::table('disease')
            ->select('*')
            ->get();

        $medicine = DB::table('medicine')
            ->select('*')
            ->get();


        return view('users.patient.editpatient',
        compact([
            'patient',
            'find',
            'hpt',
            'disease',
            'medicine',
        ]));

    }

    public function edit_patient(Request $request,$id){
        $patient = Patient::find($id);

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
            $patient->p_image = $patient->p_image;
        }

        $patient->d_id = $request->input('d_id');
        $patient->p_sysptom = $request->input('sysptom');
        // $patient->p_passwordcode = Hash::make($request->input('passwordcode'));
        $patient->p_address = $request->input('address');
        $patient->h_id = $request->input('h_id');
        $patient->me_id = $request->input('me_id');
        $patient->p_status = 0;
        $patient->u_id = 1;

           
        // echo($medic);
        $patient->update();

        return redirect('/patient')->with('status','Your add user Success');
    }
}

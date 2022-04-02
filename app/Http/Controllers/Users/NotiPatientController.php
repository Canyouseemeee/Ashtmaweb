<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB; 
use App\Models\NotiPatient;

class NotiPatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $nop = DB::table('notificationpatient')
        ->select('*')
        ->get();
            
        return view('users.notificationpatient.index',compact(['nop']));
        
    }

    public function add_notipatient(Request $request){
        
        $nop_name = $request->input('nop_name');
        $nop_temperature = $request->input('nop_temperature');
        $nop_text = $request->input('nop_text');

        $nop = new NotiPatient;
        $nop->nop_name = $nop_name;
        $nop->nop_temperature = $nop_temperature;
        $nop->nop_text = $nop_text;
        $nop->created_at = now();
        $nop->updated_at = now();

        if ($request->hasFile('video')) {
            // $filename = $request->video->getClientOriginalName();
            // $file = time() . '.' . $filename;
            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $nop->nop_video = $path;
            // dd($file);
        } else {
            $nop->nop_video = null;
        }
       

        $nop->save();

        return redirect()->back();

    }

    public function findnopid(Request $request, $id){
        $nop = NotiPatient::findOrFail($id);

        $data = DB::table('notificationpatient')
        ->select('*')
        ->where('notificationpatient.nop_id', $nop->nop_id)
        ->get();

        return response()->json($data);
    }

    public function edit_notipatient(Request $request){
        
        $nop_id = $request->input('nop_id');
        $nop_name = $request->input('nop_name2');
        $nop_temperature = $request->input('nop_temperature2');
        $nop_text = $request->input('nop_text2');

        $nop = NotiPatient::find($nop_id);
        $nop->nop_name = $nop_name;
        $nop->nop_temperature = $nop_temperature;
        $nop->nop_text = $nop_text;
        $nop->updated_at = now();
        if ($request->hasFile('video2')) {
            $path = $request->file('video2')->store('videos', ['disk' => 'my_files']);
            // dd($file);
            $nop->nop_video = $path;
        } else {
            $nop->nop_video = $nop->nop_video;
        }
        $nop->update();

        return response()->json($nop);
    }
}

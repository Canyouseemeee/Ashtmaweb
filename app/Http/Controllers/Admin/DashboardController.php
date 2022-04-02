<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medic;
use Auth;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::check()){
            
            return view('admin.dashboard');

        }else{
            return redirect('login');
        }
        return redirect('login');
    }

    
}

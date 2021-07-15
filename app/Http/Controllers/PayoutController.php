<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Departments;
use Carbon\Carbon;
class PayoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        $user_name=Auth::user()->name;
        $id_autora=Auth::user()->id;
        $department_id=Auth::user()->department_id;
        $usterki = usterkimodel::where('private', "1")
        ->where('id_autora', $id_autora)
        ->where('status', 'Niewykonane')
        ->where('department_id', $department_id)
        ->get();
        return view('payout',['usterki'=>$usterki, 'departments'=>$Departments]);
    }
    function Change($id_usterki)
    {  
        $todayDate = Carbon::now()->format('Y-m-d');
        $user_name=Auth::user()->name;
        $usterkimodel=usterkimodel::find($id_usterki);
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('status'=> "Wykonane"));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finisher'=> $user_name));
        $usterki=usterkimodel::where('id_usterki', $id_usterki)->update(array('finished_at'=>$todayDate));
        return redirect('/payout')->with('success', 'Pomyślnie zakończono wpis!');
    }
}

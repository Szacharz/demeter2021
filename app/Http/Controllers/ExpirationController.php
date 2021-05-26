<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ExpirationController extends Controller
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
    {       /** $usterkimodel->place=$req->place; */
        $todayDate = Carbon::now()->format('Y-m-d');
        $usterki = usterkimodel::where('deadline','<',$todayDate)
        ->where('status', "Niewykonane", "W trakcie")
        ->where('Private', "Nie")
        ->get();
        return view('expiration',['usterki'=>$usterki]);
    }
}

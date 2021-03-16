<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Auth;
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
        $user_name=Auth::user()->name;
        $usterki = usterkimodel::where('private', "Tak")
        ->where('autor', 'name')
        ->get();
        return view('payout',['usterki'=>$usterki]);
    }
}

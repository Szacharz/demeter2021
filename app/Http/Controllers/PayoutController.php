<?php

namespace App\Http\Controllers;
use App\Models\usterkimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $id_autora=Auth::user()->id;
        $usterki = usterkimodel::where('private', "Tak")
        ->where('id_autora', $id_autora)
        ->where('status', 'Niewykonane')
        ->get();
        return view('payout',['usterki'=>$usterki]);
    }
}

<?php

namespace App\Http\Controllers;
use usertkimodel;
use Illuminate\Http\Request;

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
        $usterki = usterkimodel::where('status', "Niewykonane")
        ->whereLike('', "")
        ->get();;
        return view('report',['usterki'=>$usterki]);
    }
}

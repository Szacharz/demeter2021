<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use Illuminate\Http\Request;



class DictionaryController extends Controller
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
    {   $groups = groups::all();
        return view('dictionary', ['grupy'=>$Groups]);
    }


}
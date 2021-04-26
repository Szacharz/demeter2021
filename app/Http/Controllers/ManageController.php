<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;

class ManageController extends Controller
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
        return view('manage');
    }
}
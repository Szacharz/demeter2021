<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use App\Models\GroupMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    {  
         $groups = groups::all();

         $grupy=DB::table('grupy')
        ->join('group_members', 'grupy.id', '=', 'group_id')
        ->join('users', 'user_id', '=', 'users.id')
        ->select('grupy.id','users.name')
        ->get();
        $grupy->transform(function($i){
        return (array)$i;
        });
        $array = $grupy->toArray();

        return view('dictionary', ['grupy'=>$groups], ['membersi' => $grupy]);
    }
   
}
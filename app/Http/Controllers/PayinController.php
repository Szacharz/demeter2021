<?php

namespace App\Http\Controllers;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
class PayinController extends Controller
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
        $groups = groups::all();
        return view('payin', ['grupa' => $groups, 'departments'=>$Departments])->with('success', 'Pomyślnie dodano nowy wpis!');
    }
}

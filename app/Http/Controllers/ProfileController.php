<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Departments;
use App\Models\usterkimodel;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
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
       
        $month = ['01','02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $loggeduser=Auth::user()->name;

        $stats=[];
        foreach($month as $key=>$value)
        {
              $stats[] = usterkimodel::where('autor', $loggeduser)
              ->where(DB::raw("DATE_FORMAT(data, '%m')"),$value)->count(); 
           
        }
        return view('profile', ['departments'=>$Departments])->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('stats',json_encode($stats,JSON_NUMERIC_CHECK));
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect('profile')->with('success', 'Pomyślnie zmieniono hasło!');
    }

    function nick(Request $req)
    {
        $users= user::find($req->input('id'));
        $users->name=$req->name;
        $users->save();
        return redirect('/profile')->with('success', 'Pomyślnie zmieniono nazwę użytkownika!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;


class NewUserSUController extends Controller
{

    use RegistersUsers;
    
    public function index()
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();

        $Departments2= new Departments;
        $Departments2= Departments::all();

        return view('newuserSU', ['departments'=>$Departments, 'departments2'=>$Departments2]);
    }
    public function store2()
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'department_id' => ['required', 'string']
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'department_id'=>request('department_id')
             ]);


        return redirect('superadmin')->with('success', 'Pomyślnie utworzono nowego użytkownika!');
    }
}
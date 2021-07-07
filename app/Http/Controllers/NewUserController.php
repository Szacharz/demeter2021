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


class NewUserController extends Controller
{

    use RegistersUsers;
    
    public function index()
    {
        $department_id=Auth::user()->department_id;
        $Departments = new Departments;
        $Departments = Departments::where('id', $department_id)
        ->get();
        return view('newuser', ['departments'=>$Departments]);
    }
    public function store()
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


        return redirect('manage')->with('success', 'Pomyślnie utworzono nowego użytkownika!');
    }
}
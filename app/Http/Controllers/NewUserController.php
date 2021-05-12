<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;



class NewUserController extends Controller
{

    use RegistersUsers;
    
    public function index()
    {
        return view('newuser');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bycrypt::make('password')
             ]);


        return redirect('manage')->with('success', 'Pomyślnie utworzono nowego użytkownika!');
    }
}
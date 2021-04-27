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
    public function index()
    {
        return view('newuser');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make('password')
             ]);


        return redirect('manage')->with('success', 'Pomyślnie utworzono nowego użytkownika!');
    }
}
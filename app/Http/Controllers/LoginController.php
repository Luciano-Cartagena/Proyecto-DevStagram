<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function index ()
    {
        return view('auth.login');
    }

    public function store (Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);
            
         if(!Auth::attempt($request->only('email','password'), $request->remember)){
            return back()->with('mensaje', 'Credenciales Incorrectas');
         }

         return redirect()->route('posts.index');
}
}
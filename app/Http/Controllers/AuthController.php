<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//сервис аутентификации
/**
 * AuthController - login, authentificate, logout. 
 * @author Yuliia Bondarenko JKTV21 Year - 2023
 * 
 * @copyright Copyright 2023
 * 
 */
class AuthController extends Controller
{
    //--------------------login: form -> request authentificate
    public function login()
    {
        return view('start');
    }
    //--------------------authentificate проверка формы Login
    public function authentificate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        //данные для входа: только email, password - решаете, что использовать
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)){
            //return redirect('dashboard');
			return redirect('/');
        }
        return redirect('login')->with('error', 'Упс! Вы ввели неверные учетные данные.');
    }
    //----------------------logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}//end class

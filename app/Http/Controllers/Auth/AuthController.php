<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
use Redirect;

// Authentification Controller
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // Session Exists
            //Login Success
            return Redirect::to('/home');
        }
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'email.required'        => 'E-mail est requis',
            'email.email'           => 'Email invalide            ',
            'password.required'     => 'Mot de passe requis',
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { 
            //Login Success
            return Redirect::to('/home');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'E-mail ou mot de passe erroné');
            return redirect()->route('login');
        }
 
    }
 
   

 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}

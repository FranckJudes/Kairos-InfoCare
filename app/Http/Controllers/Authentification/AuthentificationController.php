<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{
    //

    public function index(){
        return view('auth.loginAdmin');
    }

    public function doLogin(Request $request)

    {   
            // dd($request);
            // $credentials =  $request->validated();
           $credentials =  $request->except(['_token']);
        
           if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
           {
                    $request->session()->regenerate();
                    return redirect()->intended('dashboard');
           } 

           // Renvoyer au login en cas d'erreur avec l'identifiant du email
           return  to_route('login')->withErrors([
                    'email' => 'Email Invalide',
                    'password' => 'Mot de passe Incorrect'
           ])->onlyInput('email','password');
            
    }
}

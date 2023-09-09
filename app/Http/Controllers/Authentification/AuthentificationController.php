<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
class AuthentificationController extends Controller
{
    //

    public function index(){
        return view('auth.loginAdmin');
    }

    public function doLogin(Request $request)

    {   
           $credentials =  $request->except(['_token']);
        
           if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
           {
               
                if (!Auth::user()->password_changed) {
                    // dd('helloe wordl');
                    Toastr::warning('Veuillez modifier votre mot de passe ', 'Mot de passe', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('resetPage');
                }else{

                  $request->session()->regenerate();
                  Toastr::success('Connexion Reussi', 'Title', ["positionClass" => "toast-top-right"]);
                  return redirect()->intended('dashboard');
                    
                }
                    
           } 

           // Renvoyer au login en cas d'erreur avec l'identifiant du email
           return  to_route('login')->withErrors([
                    'email' => 'Email Invalide',
                    'password' => 'Mot de passe Incorrect'
           ])->onlyInput('email','password');
            
    }

        public function resetPage(){
            return view('auth.resetAuth');
        }

        public function changePassword(Request $request)
        {
            $user = auth()->user();
            $request->validate([
                'password' => ['required',
                             function ($attribute, $value, $fail) use ($user) {
                                        // Vérifiez si le nouveau mot de passe est identique à l'ancien mot de passe
                                        if (\Hash::check($value, $user->password)) {
                                            $fail('Le nouveau mot de passe ne peut pas être identique à l\'ancien mot de passe.');
                                        }
                            },
            ],
                'confirm_password' => 'required|same:password|min:8',
                
            ]);
          
            $user->password = bcrypt($request->input('password'));
            $user->password_changed = true;
            $user->save();

            // Redirigez l'utilisateur vers le tableau de bord ou une autre page
            Toastr::success('Modification réussie', 'Modification du mot de passe', ["positionClass" => "toast-top-right"]);
            return redirect('/dashboard')->with('success', 'Mot de passe changé avec succès');
        }


        public function logout(){
            Auth::logout();
            return to_route('login');
        }
        
        }

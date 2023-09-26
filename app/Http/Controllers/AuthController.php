<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //formulaire de connexion
    public function index(){
        return view("auth.login");
    }
     //faire connecter
     public function customLogin(Request $request){
        $request->validate([
            "email"=>"required|email",
            "password"=>"required|min:6"
        ]);
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended("students")
                             ->withSuccess("connexion réussie");
        }
        return redirect('login')->withErrors("connexion ivalide,verifier vos informations");
     }
     //formulaire enregistrement
     public function registration(){
        return view("auth.registration");
     }

     //enregistrement de User
     public function customRegistration(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6"
        ]);
        $data = $request->all();
        $check = User::create([
            "name"=>$data['name'],
            "email" => $data['email'],
            "password"=> Hash::make($data['password'])  
        ]);

      if ($check) {
       return redirect()->route("students.index")->withSuccess("Vous êtes Incris avec success");
      }
      return redirect()->route("register")->withErrors("Echec d'inscription");
       }

     public function signOut(){
        Session::flush();
        Auth::logout();
        return redirect("login");
     }
}

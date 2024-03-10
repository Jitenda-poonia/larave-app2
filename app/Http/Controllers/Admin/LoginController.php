<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
         return view("admin.login.index ");
    }
    public function login(Request $request){
      $request->validate([
         'email' => 'required',
         'password' => 'required',
      ]);
        $data = $request->only("email","password");
        
        if (Auth::attempt($data)) {
           return redirect()->route('dashboard')->with('success','user login successfully');
        } else {
           return redirect()->route('login')->with('error','Email and Password not valid please try agin');
            
        }
        
        
   }
   public function logout(){
      Auth::logout();
      return redirect()->route('login')->with('success','User logout successfully');
   }
    
}

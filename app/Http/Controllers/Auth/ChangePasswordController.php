<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword(){
        return view("auth.change-password");
    }
    public function postChangePassword (Request $request){
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required|min:7|confirmed'
        ]);
        
        //الكلمة الحالية صحيحة
        if(Hash::check($request->current_password, auth()->user()->password)){
            if($request->new_password == $request->current_password){
                session()->flash('msg','w:New Password must not like Current Password');
                return redirect(route('change-password'));
            }
            //logged in user
            $user = auth()->user();
            //edit password
            $user->password = bcrypt($request->new_password);
            //save
            $user->save();
            session()->flash('msg','s:Password changed successfully');
            return redirect(route('change-password'));
        }
        else{
            session()->flash('msg','e:Invalid Current Password');
            return redirect(route('change-password'));
        }
    }
}
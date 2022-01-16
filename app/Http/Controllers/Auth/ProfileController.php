<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Http\Requests\Auth\ProfileRequest;

class ProfileController extends Controller
{
  
    public function editProfile()
    {
        $item = auth()->user();
        return view("auth.profile",compact('item'));

    }

    public function updateProfile(ProfileRequest $request)
    {
        
        $user = auth()->user();
        $user->fill($request->all());
        $user->save();

        session()->flash("msg","s:Profile Updated Successfully");
        return redirect(route('users.index'));
     
    }
  }
<?php

namespace App\Http\Controllers;

use App\User;
use App\Companies;

use Illuminate\Http\Request;


class UserController extends Controller
{

    public function showProfile() {

        $companies = Companies::all();
    	return view('TracktimeApp.profile',compact('companies'));
    }

    public function updateProfile(Request $request,$id){

        dd($request->all());
    	if ($request->user()) {

    		$request->validate([

    			'username' => 'required|min:5|max:20',
    			'name' => 'required|min:5|max:20',
    			'email' => 'required|min:5|max:20',
    			'password'=>'required|confirmed',
                'password_confirmation'=>'sometimes|required_with:password',
    		]);

    		if (empty($request->get('password'))) {
    			User::findOrFail($id)->update($request->except('password'));
    		}else{
                unset($request['password_confirmation']);
                $request['password']=bcrypt($request['password']);
    			User::findOrFail($id)->update($request->all());
    		}
            
            \Session::flash('flash_message','Profile successfully updated.'); 
            
    		return redirect()->route('profile');
    	}
    }
}

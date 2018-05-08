<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
	// Verify the user with a given token.

    public function verify($token){

    	User::where('token',$token)->firstOrFail()

    	->update(['token' => null,
    			  'active' => 'yes',
    			]); // verify the user


    	return redirect()

    		->route('home')

    		->with('success','Account verified!');
    }

}

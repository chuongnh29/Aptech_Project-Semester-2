<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user,$social);
        Auth::login($authUser,true);
        return redirect('');
    }

    public function findOrCreateUser($user, $social){
    	$authUser = User::where('provider_id',$user->id)->first();
    	if($authUser == null){
    		return User::create([
    		'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'provider' => $social,
            'provider_id' => $user->id,
    		]);
    	}
    	return $authUser;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Validator;
use Socialite;
use Auth;
use Exception;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect('/lists');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => Hash::make('password'),
                    'roles' => 'simple'
                ]);

                Auth::login($newUser);

                return redirect('/lists');
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}

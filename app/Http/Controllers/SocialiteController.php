<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleredirect()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('socialiteID', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);

                return redirect('/');
            } else {
                $fullname = $user->getName();
                $username = str_replace(' ', '', $fullname);
                $avatar = $user->avatar;

                $birthday = Carbon::now()->subYears(20)->toDateString();

                $newUser = User::updateOrCreate([
                    'username' => $username,
                    'profile_picture' => $avatar,
                    'email' => $user->email,
                    'birthday' => $birthday,
                    'socialiteID' => $user->id,
                    'role' => "User",
                    'password' => encrypt('pogikosobra'),

                ]);

                Auth::login($newUser);

                return redirect('/')->with(['message' => "Succesfully logged in with Google!"]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $findUser = User::where('socialiteID', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);

                return redirect('/');
            } else {
                $fullname = $user->getName();
                $username = str_replace(' ', '', $fullname);
                $avatar = $user->getAvatar();

                $birthday = Carbon::now()->subYears(20)->toDateString();

                $newUser = User::updateOrCreate([
                    'username' => $username,
                    'profile_picture' => $avatar,
                    'email' => $user->email,
                    'birthday' => $birthday,
                    'socialiteID' => $user->id,
                    'role' => "User",
                    'password' => encrypt('pogisiarjay'),

                ]);

                Auth::login($newUser);

                return redirect('/')->with(['message' => "Succesfully logged in with Facebook!"]);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

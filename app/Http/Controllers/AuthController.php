<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirect_face(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_face(){
        $user = Socialite::driver('facebook')->user();
        

        
        // $user = User::create([
        //     'name' => $user->getName(),
        //     'email'=> $user->getEmail(),
        // ]);

        $user = User::firstOrCreate([
            'email'=> $user->getEmail(),
        ], [
            'name' => $user->getName(),
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }

    public function redirect_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $user = Socialite::driver('google')->user();
        echo $user->email;
        echo $user->id;
        echo $user->name;
        // dd( $user);
        // $user = User::create([
        //     'name' => $user->getName(),
        //     'email'=> $user->getEmail(),
        // ]);

        $user = User::updateOrCreate([
            'google_id' => $user->id,
        ], [
            'name' => $user->name,
            'email'=> $user->email,
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }
}

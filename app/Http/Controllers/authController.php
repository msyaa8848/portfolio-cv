<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{
    function index()
    {
        return view('auth.index');
    }

    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    #function redirect()
    #{
    #    Socialite::driver('google')
    #    ->with(['redirect_uri' => 'https://e028524.website/callback'])
    #    ->redirect();
    #}

    function callback()
    {

        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        
        $user = User::UpdateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'google_id' => $id
            ]
        );
        Auth::login($user);
        return redirect()->to('dashboard');
    }

    public function logout() 
    {
        Auth::logout();
        #return redirect()->to('auth');
        return redirect('index');
    }
}

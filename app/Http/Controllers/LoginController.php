<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();

        # só vai logar quem for admin
        $admins = explode(',', trim(env('ADMINS')));
        if(!in_array($userSenhaUnica->codpes, $admins)){
            request()->session()->flash('alert-danger', 'usuário sem permissão');
            return redirect('/');
        }

        $user = User::where('codpes',$userSenhaUnica->codpes)->first();

        if (is_null($user)) $user = new User;

        // bind do dados retornados
        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->name = $userSenhaUnica->nompes;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

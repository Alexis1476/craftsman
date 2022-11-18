<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    const GUARD = 'webadmin';

    function logout()
    {
        auth(self::GUARD)->logout();
        return redirect(route('home'));
    }
    public function validateActivity()
    {
        dump('s');
    }
    function showUser()
    {
        $user = User::where('anonymousID', \request('id'))->firstOrFail(); //mWUa
        $userActivities = $user->activities;
        return View('user.activities', ['user' => $user, 'activities' => $userActivities]);
    }

    //
    function login()
    {
        \request()->validate([
            'login' => ['required'],
            'password' => ['required']
        ]);

        $result = auth()->guard(self::GUARD)->attempt([
            'login' => \request('login'),
            'password' => \request('password') // password -> convention laravel
        ]);

        // redirection
        if ($result) {
            return redirect(route('home'));
        }

        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'login' => 'Your credentials are incorrect'
        ]);
    }
}

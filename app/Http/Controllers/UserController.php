<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    const GUARD = 'webadmin';

    function logout()
    {
        auth(self::GUARD)->logout();
        return View('home');
    }

    //
    function login()
    {
        \request()->validate([
            'login' => ['required'],
            'password' => ['required']
        ]);

        $result = auth()->guard('webadmin')->attempt([
            'login' => \request('login'),
            'password' => \request('password') // password -> convention laravel
        ]);

        // redirection
        if ($result) {
            return redirect('/');
        }

        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'login' => 'Your credentials are incorrect'
        ]);
    }
}

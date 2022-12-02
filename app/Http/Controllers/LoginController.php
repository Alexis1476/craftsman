<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login()
    {
        \request()->validate([
            'login' => ['required'],
            'password' => ['required']
        ]);

        if (filter_var(\request('login'), FILTER_VALIDATE_EMAIL)) {
            return $this->userLogin();
        }
        return $this->adminLogin();
    }

    private function userLogin()
    {
        define('GUARD', 'web');

        $result = auth()->guard(GUARD)->attempt([
            'email' => \request('login'),
            'password' => \request('password') // password -> convention laravel
        ]);

        // redirection
        if ($result) {
            return redirect(route('user.profil'));
        }

        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'login' => 'Vos identifiants sont incorrects'
        ]);
    }

    private function adminLogin()
    {
        define('GUARD', 'webadmin');

        $result = auth()->guard(GUARD)->attempt([
            'login' => \request('login'),
            'password' => \request('password')
        ]);

        // redirection
        if ($result) {
            return redirect(route('home'));
        }

        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'login' => 'Vos identifiants sont incorrectss'
        ]);
    }
}

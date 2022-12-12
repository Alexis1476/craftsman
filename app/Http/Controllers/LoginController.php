<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    /**
     * Fait la validation du formulaire de login et vérifie si c'est un utilisateur ou un administrateur
     * @return Application|RedirectResponse|Redirector
     */
    public function login(): Redirector|RedirectResponse|Application
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

    /**
     * Gère la connexion des utilisateurs (User)
     * @return Application|RedirectResponse|Redirector
     */
    private function userLogin(): Redirector|RedirectResponse|Application
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

    /**
     * Gère la connexion des administrateurs (Admin)
     * @return Application|RedirectResponse|Redirector
     */
    private function adminLogin(): Redirector|RedirectResponse|Application
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

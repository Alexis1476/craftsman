<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    const GUARD = 'webadmin';

    function logout()
    {
        auth(self::GUARD)->logout();
        return redirect(route('home'));
    }

    public function profil()
    {
        return View('admin.profil');
    }

    public function update()
    {
        \request()->validate([
            'password' => 'required', 'min:8', 'confirmed',
            'password_confirmation' => 'required'
        ]);

        auth()->guard(self::GUARD)->user()->update([
            'password' => Hash::make(\request('password'))
        ]);

        return redirect(route('admin.profil'));
    }

    public function validateActivity()
    {
        $user = User::where('anonymousID', \request('user'))->first();
        $user->activities()->sync([request('activity') => ['finished' => 1]], false);
        $user->newActivities();

        return back();
    }

    function showUser()
    {
        $user = User::where('anonymousID', \request('id'))->firstOrFail();
        $userActivities = $user->activities()->where('finished', 0)->get();
        $score = $user->score();
        return View('user.activities', ['user' => $user, 'score' => $score, 'activities' => $userActivities]);
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

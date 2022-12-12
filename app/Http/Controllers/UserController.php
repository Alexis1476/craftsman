<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use function request;

class UserController extends Controller
{
    /**
     * GUARD de UserModel pour l'authentification
     */
    const GUARD = 'web';

    /**
     * Affiche la liste d'utilisateurs
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $users = User::all();
        return View('admin.users', ['users' => $users]);
    }

    /**
     * Enregistre un utilisateur dans la base de données
     * @return Application|RedirectResponse|Redirector
     */
    public function store(): Redirector|RedirectResponse|Application
    {
        $regexPhoneNumber = '/^([0][1-9][0-9](\s|)[0-9][0-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9])$|^(([0][0]|\+)[1-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9][0-9](\s|)[0-9][0-9](\s|)[0-9][0-9])$/';

        // Validation du formulaire
        request()->validate([
            'firstName' => ['required', 'max:50'],
            'lastName' => ['required', 'max:50'],
            'phoneNumber' => ['required', "regex:$regexPhoneNumber"],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        // Si le visiteur s'est déjà enregistré
        if (User::where('email', request('email'))->first()) {
            return back()->withInput()->withErrors([
                'email' => 'Un compte existe déjà avec cette adresse email'
            ]);
        }

        // Génération de l'ID unique
        $hashids = new Hashids(request('email'), 0, 'QWERTZUIOPASDFGHJKLYXCVBNM0123456789');
        $id = $hashids->encode(1, 2);

        // Insertion dans la base de données
        $user = User::create([
            'anonymousID' => $id,
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'phoneNumber' => request('phoneNumber'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        // Ajout des activités
        $user->newActivities();

        // Connexion du visiteur
        auth()->guard(self::GUARD)->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        return redirect(route('user.profil'));
    }

    /**
     * Affiche le profil de l'utilsiateur connecté
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = auth(self::GUARD)->user();
        $activities = $user->activities()->where('finished', 0)->get();
        $score = $user->score();
        return View('user.activities', ['score' => $score, 'activities' => $activities, 'user' => $user]);
    }

    /**
     * Supprime l'utilisateur de la base de données
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        User::destroy([$id]);
        return back();
    }

    /**
     * Déconnecte l'utilisateur
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(): Redirector|RedirectResponse|Application
    {
        auth()->logout();
        return redirect(route('home'));
    }
}

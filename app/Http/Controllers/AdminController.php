<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use function request;

class AdminController extends Controller
{
    /**
     * GUARD de AdminModel pour l'authentification
     */
    const GUARD = 'webadmin';

    /**
     * Déconnecte l'administrateur
     * @return Application|RedirectResponse|Redirector
     */
    function logout(): Redirector|RedirectResponse|Application
    {
        auth(self::GUARD)->logout();
        return redirect(route('home'));
    }

    /**
     * Affiche le profil de l'administrateur
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {
        return View('admin.show');
    }

    /**
     * Recherche un utilisateur par son AnonymousID
     * @return Application|RedirectResponse|Redirector
     */
    public function searchUser(): Redirector|RedirectResponse|Application
    {
        $user = User::where('anonymousID', request('id'))->first();

        if (!$user) {
            return back()->withErrors([
                'id' => 'L\'utilisateur n\'existe pas'
            ]);
        }
        return redirect(route('admin.showUser', ['id' => $user->anonymousID]));
    }

    /**
     * Met à jour le mot de passe de l'admin
     * @return Application|RedirectResponse|Redirector
     */
    public function update(): Redirector|RedirectResponse|Application
    {
        request()->validate([
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ]);

        auth()->guard(self::GUARD)->user()->update([
            'password' => Hash::make(request('password'))
        ]);

        return redirect(route('admin.profil'));
    }

    /**
     * Marque comme "finie" une activité d'un utilisateur donné
     * @param $userId
     * @param $activityId
     * @return RedirectResponse
     */
    public function validateActivity($userId, $activityId): RedirectResponse
    {
        $user = User::where('anonymousID', $userId)->first();
        $user->activities()->sync([$activityId => ['finished' => 1]], false);
        $user->newActivities();

        return back();
    }

    /**
     * Affiche le profil d'un utilisateur donné (AnonymousID)
     * @param $id
     * @return Application|Factory|View
     */
    function showUser($id): View|Factory|Application
    {
        $user = User::where('anonymousID', $id)->firstOrFail();
        $userActivities = $user->activities()->where('finished', 0)->get();
        return View('user.activities', ['user' => $user, 'activities' => $userActivities]);
    }
}

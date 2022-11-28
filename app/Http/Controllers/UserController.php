<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Hashids\Hashids;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    const GUARD = 'web';

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $users = User::all();
        return View('admin.users', ['users' => $users]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }

    public function login()
    {
        \request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $result = auth()->guard(self::GUARD)->attempt([
            'email' => \request('email'),
            'password' => \request('password') // password -> convention laravel
        ]);

        // redirection
        if ($result) {
            return redirect(route('user.profil'));
        }

        // Retourne page précedente avec les données écris dans le formulaire + erreurs
        return back()->withInput()->withErrors([
            'email' => 'Your credentials are incorrect'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
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
        if (User::where('email', \request('email'))->first()) {
            return back()->withInput()->withErrors([
                'email' => 'Un compte existe déjà avec cette adresse email'
            ]);
        }

        // Génération de l'ID unique
        $hashids = new Hashids(\request('email'), 0, 'QWERTZUIOPASDFGHJKLYXCVBNM0123456789');
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
            'email' => \request('email'),
            'password' => \request('password') // password -> convention laravel
        ]);

        return redirect(route('user.profil'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $user = auth(self::GUARD)->user();
        $activities = $user->activities()->where('finished', 0)->get();
        $score = $user->score();
        return View('user.activities', ['score' => $score, 'activities' => $activities, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateUserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitorRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

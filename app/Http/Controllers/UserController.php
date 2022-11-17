<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Hashids\Hashids;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class VisitorController extends Controller
{
    const GUARD = 'web';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function logout()
    {
        auth()->logout();
        return View('home');
    }

    public function login()
    {
        /*TODO : Finir authentification visitor*/
        $result = auth()->guard(self::GUARD)->attempt([
            'email' => \request('email'),
            'password' => \request('password') // password -> convention laravel
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        // Validation du formulaire
        request()->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'phoneNumber' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        // Si le visiteur s'est déjà enregistré
        if (User::where('email', \request('email'))->first()) {
            return back()->withInput()->withErrors([
                'email' => 'Un compte existe déjà avec cette adresse email'
            ]);
        }

        // Génération de l'ID unique
        $hashids = new Hashids(\request('email'));
        $id = $hashids->encode(1, 2);

        // Insertion dans la base de données
        $visitor = User::create([
            'anonymousID' => $id,
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'phoneNumber' => request('phoneNumber'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        // Ajout des activités
        $visitor->newActivities();

        // Connexion du visiteur
        auth()->guard(self::GUARD)->attempt([
            'email' => \request('email'),
            'password' => \request('password') // password -> convention laravel
        ]);

        return redirect(route('visitor.activities', ['id' => auth(self::GUARD)->user()->anonymousID]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreVisitorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $visitor
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
        $activities = User::where('anonymousID', \request('id'))->firstOrFail()->activities()->where('finished', 0)->get();

        return View('visitor.activities', ['activities' => $activities]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateVisitorRequest $request
     * @param \App\Models\User $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitorRequest $request, User $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $visitor)
    {
        //
    }
}

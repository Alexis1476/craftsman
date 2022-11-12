<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Hashids\Hashids;
use App\Models\Visitor;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {
        /*TODO : Finir authentification visitor*/
        $result = auth()->attempt([
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
        if (Visitor::where('email', \request('email'))->first()) {
            return back()->withInput()->withErrors([
                'email' => 'Un compte existe déjà avec cette adresse email'
            ]);
        }

        // Génération de l'ID unique
        $hashids = new Hashids(\request('email'));
        $id = $hashids->encode(1, 2);

        // Insertion dans la base de données
        Visitor::create([
            'anonymousID' => $id,
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'phoneNumber' => request('phoneNumber'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        redirect(route('home'));
    }

    public function test()
    {
        define('NB_ACTIVITIES', 5);

        // Visiteur qui fini l'activité
        $visitor = Visitor::where('anonymousID', 'x5UA')->firstOrFail();
        $visitorActivities = $visitor->activities->pluck('id'); // Pluck: Get seule les ids

        // Activités que le visiteur n'a pas encore fait
        $activities = Activity::whereNotIn('id', $visitorActivities)->select()->get()->pluck('id');

        // Nombre d'activités maximales
        $nbMaxNewActivities = NB_ACTIVITIES;
        if (count($activities) < NB_ACTIVITIES)
            $nbMaxNewActivities = count($activities);

        // Selection de 5 activités random
        $newActivities = [];
        for ($i = 0; $i < 5; $i++) {
            $newActivities = array_rand($activities->toArray(), $nbMaxNewActivities);
        }


        //

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
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
        /*$visitor = Visitor::find(1);
        $activity = Activity::find(1);
        $visitor->activities()->attach($activity, ['finished' => 0]);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateVisitorRequest $request
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitorRequest $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Visitor $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}

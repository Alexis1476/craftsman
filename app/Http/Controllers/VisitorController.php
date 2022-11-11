<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Visitor;
use App\Http\Requests\StoreVisitorRequest;
use App\Http\Requests\UpdateVisitorRequest;
use http\Env\Request;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Génération de l'ID unique
        $hashids = new Hashids(\request('email'));
        dump($hashids->encode(1, 2));
        die;
        // Validation du formulaire
        request()->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'phoneNumber' => ['required'],
            'email' => ['required']
        ]);

        // Insertion dans la base de données
        Visitor::create([
            'anonymousID' => /*TODO : Generate unique ID*/ 2,
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'phoneNumber' => request('phoneNumber'),
            'email' => request('email')
        ]);

        return redirect('/');
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

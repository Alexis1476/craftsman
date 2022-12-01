<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Category;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return View('activities.list', ['activities' => Activity::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get categories
        $categories = Category::all();
        return View('activities.new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        \request()->validate([
            'category' => ['required'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'laboratory' => ['required'],
            'why' => ['required'],
            'points' => ['required', 'numeric', 'gt:0'],
        ]);

        Activity::create([
            'name' => \request('name'),
            'description' => \request('description'),
            'why' => \request('why'),
            'laboratory' => \request('laboratory'),
            'points' => \request('points'),
            'category_id' => \request('category')
        ]);

        return redirect(route('activities'));
    }

    /**
     * Display the specified resource.
     *
     */
    public function show()
    {
        $categories = Category::all();
        $activity = Activity::find(request('id'));
        return View('activities.activity', ['activity' => $activity, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update()
    {
        $activity = Activity::find(request('id'));

        $activity->update([
            'name' => request('name'),
            'description' => request('description'),
            'why' => request('why'),
            'points' => request('points'),
            'laboratory' => request('laboratory'),
            'category_id' => request('category'),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Activity $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}

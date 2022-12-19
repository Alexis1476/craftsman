<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use function request;

class ActivityController extends Controller
{
    /**
     * Affiche la liste des activités
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return View('activities.index', ['activities' => Activity::orderBy('name')->get()]);
    }

    /**
     * Affiche le formulaire pour ajouter une nouvelle activité
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $categories = Category::all();

        return View('activities.create', ['categories' => $categories]);
    }

    /**
     * Enregistre une nouvelle activité dans la base de données
     * @return Application|RedirectResponse|Redirector
     */
    public function store(): Redirector|RedirectResponse|Application
    {
        request()->validate([
            'category' => ['required'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'laboratory' => ['required'],
            'why' => ['required'],
            'points' => ['required', 'numeric', 'gt:0'],
        ]);

        Activity::create([
            'name' => request('name'),
            'description' => request('description'),
            'why' => request('why'),
            'laboratory' => request('laboratory'),
            'points' => request('points'),
            'category_id' => request('category')
        ]);

        return redirect(route('activities'));
    }

    /**
     * Affiche une activité donnée
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $categories = Category::all();
        $activity = Activity::find($id);
        return View('activities.show', ['activity' => $activity, 'categories' => $categories]);
    }

    /**
     * Met à jour une activité donnée dans la base de données
     * @param $id
     * @return RedirectResponse
     */
    public function update($id): RedirectResponse
    {
        $activity = Activity::find($id);

        request()->validate([
            'category' => ['required'],
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'laboratory' => ['required'],
            'why' => ['required'],
            'points' => ['required', 'numeric', 'gt:0'],
        ]);

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
     * Supprime une activité de la base de données
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        Activity::destroy([$id]);
        return back();
    }
}

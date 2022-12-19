<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class CategoryController extends Controller
{

    /**
     * Affiche la liste de catégories
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return View('categories.index', ['categories' => Category::all()]);
    }

    /**
     * Affiche la liste d'activités d'une catégorie donnée
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $category = Category::find($id);
        $activities = Activity::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
        return View('activities.index', ['category' => $category, 'activities' => $activities]);
    }
}

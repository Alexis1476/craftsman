<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Affiche les scores (les 10 premiers)
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $scores = DB::table('users')->join('user_activities', 'users.id', '=', 'user_activities.user_id')
            ->join('activities', 'activities.id', '=', 'user_activities.activity_id')
            ->select(DB::raw('users.anonymousID AS user, SUM(points) AS total'))->where('finished', 1)
            ->groupBy('users.anonymousID')->orderBy('total', 'desc')->limit(10)->get();

        return View('scores', ['scores' => $scores]);
    }
}

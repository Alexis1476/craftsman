<?php

namespace App\Http\Controllers;

use App\Models\Score;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ScoreController extends Controller
{
    //
    public function show()
    {
        $scores = DB::table('users')->join('user_activities', 'users.id', '=', 'user_activities.user_id')
            ->join('activities', 'activities.id', '=', 'user_activities.activity_id')
            ->select(DB::raw('users.anonymousID AS user, SUM(points) AS total'))->where('finished', 1)
            ->groupBy('users.anonymousID')->orderBy('total', 'desc')->limit(10)->get();

        return View('scores', ['scores' => $scores]);
    }
}

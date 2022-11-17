<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScoreController extends Controller
{
    //
    public function show()
    {
        $scores = Score::all();
        return View('scores', ['scores' => $scores]);
    }
}

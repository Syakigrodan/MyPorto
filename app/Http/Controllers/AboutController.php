<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Skill;

class AboutController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::orderBy('sort_order')->get();
        $experiences = Experience::orderByDesc('start_date')->get();

        return view('about', compact('skills', 'experiences'));
    }
}
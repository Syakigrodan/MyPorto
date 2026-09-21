<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Arr;

class PortfolioController extends Controller
{
    public function __invoke()
    {
        $projects = Project::orderBy('sort_order')->paginate(9);

        $allTech = Project::all()
            ->pluck('tech_stack')
            ->flatten()
            ->unique()
            ->values()
            ->sort();

        return view('portfolio', compact('projects', 'allTech'));
    }
}
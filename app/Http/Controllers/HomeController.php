<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;

class HomeController extends Controller
{
    public function __invoke()
    {
        $skills = Skill::orderBy('sort_order')->get();

        $projects = Project::where('featured', true)
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $experiences = Experience::orderByDesc('start_date')->get();

        $posts = Post::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('skills', 'projects', 'experiences', 'posts'));
    }
}
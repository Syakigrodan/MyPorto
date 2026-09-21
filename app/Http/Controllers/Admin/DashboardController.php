<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;

class DashboardController
{
    public function __invoke()
    {
        $stats = [
            'projects' => Project::count(),
            'posts' => Post::count(),
            'skills' => Skill::count(),
            'experiences' => Experience::count(),
        ];

        $latestPosts = Post::latest()->take(5)->get();
        $latestProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestPosts', 'latestProjects'));
    }
}
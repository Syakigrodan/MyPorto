<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use App\Models\ContactSubmission;
use App\Models\Project;
use App\Models\Skill;

class DashboardController
{
    public function __invoke()
    {
        $stats = [
            'projects' => Project::count(),
            'skills' => Skill::count(),
            'certificates' => Certificate::count(),
            'contacts' => ContactSubmission::count(),
        ];

        $latestProjects = Project::latest()->take(5)->get();
        $latestCertificates = Certificate::latest()->take(5)->get();
        $latestContacts = ContactSubmission::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestProjects', 'latestCertificates', 'latestContacts'));
    }
}

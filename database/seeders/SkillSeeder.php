<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP & Laravel', 'icon' => '🐘', 'level' => 92, 'sort_order' => 1],
            ['name' => 'JavaScript / TypeScript', 'icon' => '🟨', 'level' => 88, 'sort_order' => 2],
            ['name' => 'Vue.js / React', 'icon' => '⚛️', 'level' => 85, 'sort_order' => 3],
            ['name' => 'Tailwind CSS', 'icon' => '🎨', 'level' => 90, 'sort_order' => 4],
            ['name' => 'MySQL / PostgreSQL', 'icon' => '🗄️', 'level' => 84, 'sort_order' => 5],
            ['name' => 'Docker', 'icon' => '🐳', 'level' => 75, 'sort_order' => 6],
            ['name' => 'Git & GitHub', 'icon' => '🌿', 'level' => 89, 'sort_order' => 7],
            ['name' => 'UI/UX Design', 'icon' => '✏️', 'level' => 78, 'sort_order' => 8],
            ['name' => 'RESTful API', 'icon' => '🔌', 'level' => 87, 'sort_order' => 9],
            ['name' => 'Bootstrap', 'icon' => '🅱️', 'level' => 91, 'sort_order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
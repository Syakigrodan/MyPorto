<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP & Laravel', 'icon' => '🐘', 'category' => 'Backend', 'level' => 92, 'sort_order' => 1],
            ['name' => 'JavaScript / TypeScript', 'icon' => '🟨', 'category' => 'Frontend', 'level' => 88, 'sort_order' => 2],
            ['name' => 'Vue.js / React', 'icon' => '⚛️', 'category' => 'Frontend', 'level' => 85, 'sort_order' => 3],
            ['name' => 'Tailwind CSS', 'icon' => '🎨', 'category' => 'Frontend', 'level' => 90, 'sort_order' => 4],
            ['name' => 'Bootstrap', 'icon' => '🅱️', 'category' => 'Frontend', 'level' => 91, 'sort_order' => 5],
            ['name' => 'MySQL / PostgreSQL', 'icon' => '🗄️', 'category' => 'Backend', 'level' => 84, 'sort_order' => 6],
            ['name' => 'RESTful API', 'icon' => '🔌', 'category' => 'Backend', 'level' => 87, 'sort_order' => 7],
            ['name' => 'Docker', 'icon' => '🐳', 'category' => 'DevOps', 'level' => 75, 'sort_order' => 8],
            ['name' => 'Git & GitHub', 'icon' => '🌿', 'category' => 'DevOps', 'level' => 89, 'sort_order' => 9],
            ['name' => 'UI/UX Design', 'icon' => '✏️', 'category' => 'Tools', 'level' => 78, 'sort_order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}

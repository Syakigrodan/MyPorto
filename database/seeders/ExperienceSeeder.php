<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'TechNova Studio',
                'role' => 'Full-Stack Developer',
                'location' => 'Jakarta Selatan',
                'start_date' => '2023-03-01',
                'end_date' => null,
                'description' => 'Mengembangkan aplikasi web berbasis Laravel dan Vue.js untuk klien enterprise, memimpin migrasi sistem legacy, serta mengoptimalkan performa database hingga 40%.',
                'sort_order' => 1,
            ],
            [
                'company' => 'Kreatif Digital Agency',
                'role' => 'Web Developer',
                'location' => 'Bandung',
                'start_date' => '2021-06-01',
                'end_date' => '2023-02-28',
                'description' => 'Membangun lebih dari 20 website company profile dan toko online dengan waktu pengerjaan di bawah tenggat. Berkolaborasi dengan tim desain untuk menghasilkan UI yang menarik.',
                'sort_order' => 2,
            ],
            [
                'company' => 'Freelance',
                'role' => 'Web Developer',
                'location' => 'Remote',
                'start_date' => '2019-01-01',
                'end_date' => '2021-05-31',
                'description' => 'Mengerjakan berbagai proyek freelance, mulai dari landing page, sistem kasir, hingga aplikasi manajemen inventaris menggunakan stack PHP, MySQL, dan JavaScript.',
                'sort_order' => 3,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Certified Laravel Developer',
                'issuer' => 'Codepolitan',
                'category' => 'Web Development',
                'issued_date' => '2025-06-15',
                'credential_url' => '#',
                'description' => 'Kompetensi pengembangan aplikasi web modern menggunakan Laravel, mulai dari routing hingga deployment.',
                'sort_order' => 1,
            ],
            [
                'title' => 'AWS Cloud Practitioner',
                'issuer' => 'Amazon Web Services',
                'category' => 'Cloud & DevOps',
                'issued_date' => '2024-11-02',
                'credential_url' => '#',
                'description' => 'Pemahaman dasar layanan cloud AWS, arsitektur, keamanan, dan prinsip cloud fundamental.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Google UX Design Professional',
                'issuer' => 'Google',
                'category' => 'UI/UX Design',
                'issued_date' => '2023-08-20',
                'credential_url' => '#',
                'description' => 'Proses desain UX end-to-end: riset pengguna, wireframe, prototipe, dan usability testing.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Full-Stack JavaScript Certification',
                'issuer' => 'freeCodeCamp',
                'category' => 'Web Development',
                'issued_date' => '2023-03-10',
                'credential_url' => '#',
                'description' => 'Kurikulum full-stack JavaScript mencakup front-end, struktur data, dan API.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Docker Essentials',
                'issuer' => 'IBM',
                'category' => 'Cloud & DevOps',
                'issued_date' => '2024-05-09',
                'credential_url' => '#',
                'description' => 'Dasar containerization, image, Docker Compose, dan alur kerja CI/CD sederhana.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Python for Data Science',
                'issuer' => 'IBM',
                'category' => 'Data & AI',
                'issued_date' => '2022-12-01',
                'credential_url' => '#',
                'description' => 'Analisis data dan visualisasi menggunakan Python, pandas, dan library pendukung.',
                'sort_order' => 6,
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::create($certificate);
        }
    }
}

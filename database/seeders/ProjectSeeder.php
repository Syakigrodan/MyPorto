<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Kasir Restoran',
                'slug' => 'sistem-kasir-restoran',
                'description' => 'Aplikasi point-of-sale lengkap untuk restoran: manajemen menu, meja, pesanan, pembayaran, dan laporan penjualan harian secara real-time.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['Laravel', 'MySQL', 'Bootstrap', 'JavaScript'],
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'E-Commerce Kopi',
                'slug' => 'e-commerce-kopi',
                'description' => 'Toko online untuk produk kopi dengan keranjang belanja, checkout, pembayaran otomatis, dan dashboard admin untuk kelola produk serta pesanan.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['Laravel', 'Vue.js', 'Tailwind CSS', 'MySQL'],
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Aplikasi Presensi Digital',
                'slug' => 'aplikasi-presensi-digital',
                'description' => 'Sistem absensi berbasis web dengan QR code, laporan kehadiran, manajemen karyawan, dan notifikasi otomatis untuk mempermudah administrasi kepegawaian.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['PHP', 'MySQL', 'JavaScript', 'Bootstrap'],
                'featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Landing Page Startup',
                'slug' => 'landing-page-startup',
                'description' => 'Landing page modern untuk startup teknologi dengan animasi halus, optimasi SEO, dan kecepatan muat di bawah 1 detik menggunakan teknik lazy loading.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['HTML', 'Tailwind CSS', 'JavaScript', 'Vite'],
                'featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'REST API Manajemen Inventori',
                'slug' => 'rest-api-manajemen-inventori',
                'description' => 'API RESTful untuk manajemen inventori gudang dengan autentikasi token, pagination, validasi, serta dokumentasi otomatis menggunakan Swagger.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['Laravel', 'MySQL', 'REST API', 'Swagger'],
                'featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Dashboard Analitik',
                'slug' => 'dashboard-analitik',
                'description' => 'Dashboard analitik interaktif dengan visualisasi data penjualan, grafik real-time, serta filter dinamis untuk mendukung pengambilan keputusan bisnis.',
                'link' => '#',
                'github' => 'https://github.com/',
                'tech_stack' => ['Vue.js', 'Chart.js', 'Laravel', 'Tailwind CSS'],
                'featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
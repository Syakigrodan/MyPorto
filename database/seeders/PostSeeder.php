<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Memulai Karir sebagai Web Developer di 2026',
                'slug' => 'memulai-karir-web-developer-2026',
                'excerpt' => 'Panduan lengkap bagi pemula yang ingin berkarier sebagai web developer, mulai dari pilihan teknologi, jalur belajar, hingga tips menyusun portofolio.',
                'body' => "Industri teknologi terus berkembang pesat, dan web developer menjadi salah satu profesi yang paling banyak dicari. Berikut langkah-langkah yang bisa Anda tempuh.\n\n## 1. Kuasai Dasar-dasarnya\n\nMulailah dari HTML, CSS, dan JavaScript sebelum lanjut ke framework.\n\n## 2. Pilih Jalur Fokus\n\nFrontend, backend, atau full-stack? Kenali minat Anda lalu fokus.\n\n## 3. Bangun Portofolio\n\nSebuah portofolio yang baik lebih berharga daripada sertifikat. Buat proyek nyata yang memecahkan masalah riil.\n\n## 4. Terus Belajar\n\nTeknologi berubah. Jadikan belajar sebagai kebiasaan harian Anda.",
                'is_published' => true,
                'published_at' => '2026-01-15 09:00:00',
            ],
            [
                'title' => '10 Trik Laravel yang Jarang Diketahui',
                'slug' => '10-trik-laravel-jarang-diketahui',
                'excerpt' => 'Tips dan trik Laravel untuk menulis kode yang lebih bersih, efisien, dan elegan dalam pengembangan aplikasi sehari-hari.',
                'body' => "Setelah bertahun-tahun menggunakan Laravel, saya menemukan beberapa trik yang sangat membantu:\n\n- Gunakan **route model binding** untuk menyederhanakan controller.\n- Manfaatkan **Eloquent Accessor** untuk memformat data di sisi model.\n- Pakai **Query Builder Macro** untuk query yang berulang.\n- Gunakan **`when()`** pada query builder untuk filter opsional.\n- Simpan konfigurasi di **config file**, bukan di dalam kode.\n\nSemoga bermanfaat untuk proyek Anda berikutnya!",
                'is_published' => true,
                'published_at' => '2026-02-03 14:30:00',
            ],
            [
                'title' => 'Mengenal CSS 3D Transform untuk Desain Web Modern',
                'slug' => 'mengenal-css-3d-transform',
                'excerpt' => 'Transformasi 3D di CSS dapat membuat website Anda tampil beda. Pelajari konsep dasar dan contoh penerapannya di sini.',
                'body' => "CSS 3D transform membuka kemungkinan desain baru yang memukau tanpa perlu library JavaScript berat.\n\n## Konsep Dasar\n\n- **perspective** untuk memberikan efek kedalaman.\n- **rotateX, rotateY, rotateZ** untuk memutar elemen dalam ruang 3D.\n- **translateZ** untuk memindahkan elemen mendekati atau menjauhi layar.\n\n## Contoh Penerapan\n\n### Kartu yang mengikuti kursor (tilt effect)\n\nPada saat mouse bergerak di atas kartu, hitung posisi relatif kursor lalu beri rotasi pada sumbu X dan Y.\n\n### Kubus 3D berputar\n\nGabungkan enam elemen yang diposisikan dengan `rotateY` dan `translateZ`, lalu animasikan rotasinya.\n\nCoba eksplorasi - efek 3D yang halus akan membuat portofolio Anda tampil lebih premium.",
                'is_published' => true,
                'published_at' => '2026-03-01 10:00:00',
            ],
            [
                'title' => 'Rahasia Website Cepat: Optimasi yang Langsung Terasa',
                'slug' => 'rahasia-website-cepat',
                'excerpt' => 'Cara praktis mempercepat website Anda: gambar ringkas, caching, dan pengurangan request. Hasilnya langsung terlihat di skor performa.',
                'body' => "Website yang lambat membuat pengunjung pergi. Berikut rahasia yang langsung memberikan efek:\n\n1. **Optimasi gambar** - gunakan format WebP dan kompres tanpa mengurangi kualitas visual.\n2. **Gunakan caching** - opcode cache, query cache, dan HTTP cache.\n3. **Gabungkan dan minify asset** JavaScript serta CSS.\n4. **Lazy loading** untuk gambar di bawah layar.\n5. **Pilih font yang ringan** - batasi jumlah variasi font.\n\nDengan langkah-langkah ini, banyak klien saya melihat peningkatan skor Lighthouse dari 40-an menjadi 90-an.",
                'is_published' => true,
                'published_at' => '2026-03-20 16:45:00',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
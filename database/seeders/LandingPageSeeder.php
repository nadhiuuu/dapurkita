<?php

namespace Database\Seeders;

use App\Models\AboutAdvantage;
use App\Models\AboutSection;
use App\Models\FooterSetting;
use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Seed the default landing page content.
     */
    public function run(): void
    {
        $hero = HeroSection::setting();
        $hero->update([
            'title' => 'Temukan inspirasi,',
            'highlight' => 'bagikan kreasi',
            'description' => 'Temukan inspirasi dari berbagai kreasi yang ada, dan bagikan kreasi Anda sendiri untuk menginspirasi orang lain. Bergabunglah dengan komunitas kami dan jadilah bagian dari perjalanan kreatif ini.',
            'button_text' => 'Cari Resep',
            'button_url' => '/resep',
        ]);

        $about = AboutSection::setting();
        $about->update([
            'title' => 'Lebih dari sekadar',
            'highlight' => 'kumpulan resep',
            'description' => 'DapurKita adalah platform berbagi resep dan tips memasak yang lahir dari kecintaan terhadap masakan rumahan. Kami percaya setiap orang bisa menjadi koki di dapurnya sendiri — yang dibutuhkan hanyalah inspirasi dan sedikit keberanian untuk mencoba.',
            'button_text' => 'Mulai Berbagi',
            'button_url' => '/registrasi',
        ]);

        $advantages = [
            [
                'icon' => 'users',
                'title' => 'Komunitas aktif',
                'description' => 'Ribuan pengguna berbagi resep dan pengalaman memasak setiap hari.',
            ],
            [
                'icon' => 'book-open',
                'title' => 'Konten berkualitas',
                'description' => 'Setiap resep dan artikel melewati kurasi agar mudah dipraktikkan.',
            ],
            [
                'icon' => 'chef-hat',
                'title' => 'Gratis selamanya',
                'description' => 'Nikmati semua fitur tanpa biaya. Masak, bagikan, dan terinspirasi.',
            ],
        ];

        foreach ($advantages as $index => $advantage) {
            AboutAdvantage::updateOrCreate(
                [
                    'about_section_id' => $about->id,
                    'title' => $advantage['title'],
                ],
                [
                    'icon' => $advantage['icon'],
                    'description' => $advantage['description'],
                    'sort_order' => $index + 1,
                ],
            );
        }

        $footer = FooterSetting::setting();
        $footer->update([
            'description' => 'Platform resep masakan dan tips dapur harian untuk membantu Anda menyajikan hidangan lezat dan sehat bersama keluarga.',
            'address' => 'Jl. Masak Lezat No. 1, Jakarta',
            'email' => 'halo@dapurkita.id',
            'phone' => '+62 812 3456 7890',
            'copyright' => '© '.date('Y').' DapurKita. Semua Hak Cipta Dilindungi.',
        ]);
    }
}

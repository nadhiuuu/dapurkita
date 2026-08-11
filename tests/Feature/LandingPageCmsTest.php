<?php

namespace Tests\Feature;

use App\Models\AboutSection;
use App\Models\FooterSetting;
use App\Models\HeroSection;
use App\Models\User;
use Database\Seeders\LandingPageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LandingPageCmsTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    public function test_home_page_shows_seeded_landing_content(): void
    {
        $this->seed(LandingPageSeeder::class);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Temukan inspirasi,')
            ->assertSee('bagikan kreasi')
            ->assertSee('Komunitas aktif')
            ->assertSee('Gratis selamanya')
            ->assertSee('halo@dapurkita.id');
    }

    public function test_admin_can_view_landing_page_sections(): void
    {
        $this->seed(LandingPageSeeder::class);
        $admin = $this->admin();

        $this->actingAs($admin)->get(route('admin.landing-page.hero'))->assertOk();
        $this->actingAs($admin)->get(route('admin.landing-page.about'))->assertOk();
        $this->actingAs($admin)->get(route('admin.landing-page.footer'))->assertOk();
    }

    public function test_admin_can_update_hero_section_with_image(): void
    {
        Storage::fake('public');

        $this->seed(LandingPageSeeder::class);
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.landing-page.hero.update'), [
                'title' => 'Judul baru',
                'highlight' => 'sorotan baru',
                'description' => 'Deskripsi baru untuk hero',
                'button_text' => 'Jelajahi',
                'button_url' => '/resep',
                'image' => UploadedFile::fake()->image('hero.jpg', 1200, 600),
            ])
            ->assertRedirect(route('admin.landing-page.hero'));

        $this->assertDatabaseHas('hero_sections', [
            'title' => 'Judul baru',
            'highlight' => 'sorotan baru',
            'description' => 'Deskripsi baru untuk hero',
        ]);

        $this->assertNotNull(HeroSection::setting()->image);

        Storage::disk('public')->assertExists(HeroSection::setting()->image);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Judul baru')
            ->assertSee('sorotan baru')
            ->assertSee('Deskripsi baru untuk hero');
    }

    public function test_admin_can_update_about_section_and_manage_advantages(): void
    {
        $this->seed(LandingPageSeeder::class);
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.landing-page.about.update'), [
                'title' => 'Judul tentang baru',
                'highlight' => 'sorotan baru',
                'description' => 'Deskripsi tentang baru',
                'button_text' => 'Gabung',
                'button_url' => '/registrasi',
            ])
            ->assertRedirect(route('admin.landing-page.about'));

        $this->assertDatabaseHas('about_sections', ['title' => 'Judul tentang baru']);

        $this->actingAs($admin)
            ->post(route('admin.landing-page.about.advantages.store'), [
                'icon' => 'star',
                'title' => 'Keunggulan baru',
                'description' => 'Deskripsi keunggulan baru',
            ])
            ->assertRedirect(route('admin.landing-page.about'));

        $this->assertDatabaseHas('about_advantages', ['title' => 'Keunggulan baru']);

        $advantage = AboutSection::setting()->advantages()->where('title', 'Keunggulan baru')->first();

        $this->actingAs($admin)
            ->put(route('admin.landing-page.about.advantages.update', $advantage), [
                'icon' => 'heart',
                'title' => 'Keunggulan terbaru',
                'description' => 'Deskripsi diperbarui',
            ])
            ->assertRedirect(route('admin.landing-page.about'));

        $this->assertDatabaseHas('about_advantages', ['title' => 'Keunggulan terbaru']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Judul tentang baru')
            ->assertSee('Keunggulan terbaru');

        $this->actingAs($admin)
            ->delete(route('admin.landing-page.about.advantages.destroy', $advantage))
            ->assertRedirect(route('admin.landing-page.about'));

        $this->assertDatabaseMissing('about_advantages', ['id' => $advantage->id]);
    }

    public function test_admin_can_update_footer_settings(): void
    {
        $this->seed(LandingPageSeeder::class);
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.landing-page.footer.update'), [
                'description' => 'Deskripsi footer baru',
                'address' => 'Jl. Baru No. 10',
                'email' => 'kontak@dapurkita.id',
                'phone' => '+62 800 1234 5678',
                'instagram' => 'https://instagram.com/dapurkita',
                'copyright' => '© 2026 DapurKita. Hak cipta.',
            ])
            ->assertRedirect(route('admin.landing-page.footer'));

        $this->assertDatabaseHas('footer_settings', [
            'description' => 'Deskripsi footer baru',
            'email' => 'kontak@dapurkita.id',
        ]);

        $this->assertNotNull(FooterSetting::setting()->instagram);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Deskripsi footer baru')
            ->assertSee('kontak@dapurkita.id')
            ->assertSee('© 2026 DapurKita. Hak cipta.');
    }

    public function test_hero_update_requires_valid_data(): void
    {
        $admin = $this->admin();

        $this->actingAs($admin)
            ->put(route('admin.landing-page.hero.update'), [
                'title' => '',
                'description' => '',
            ])
            ->assertSessionHasErrors(['title', 'description']);
    }

    public function test_non_admin_cannot_access_landing_page_management(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
            ->get(route('admin.landing-page.hero'))
            ->assertForbidden();
    }
}

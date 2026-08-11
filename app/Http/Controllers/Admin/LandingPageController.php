<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutAdvantage;
use App\Models\AboutSection;
use App\Models\FooterSetting;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{

    public function index()
    {
        return redirect()->route('admin.landing-page.hero');
    }

    public function hero()
    {
        return view('pages.admin.landing_page.hero', [
            'hero' => $this->heroSection(),
        ]);
    }

    /**
     * Update the hero section.
     */
    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'highlight' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
        ], [], [
            'title' => 'judul',
            'highlight' => 'teks sorotan',
            'description' => 'deskripsi',
            'image' => 'gambar hero',
            'button_text' => 'teks tombol',
            'button_url' => 'tautan tombol',
        ]);

        $hero = $this->heroSection();

        if ($request->hasFile('image')) {
            if ($hero->image) {
                Storage::disk('public')->delete($hero->image);
            }

            $validated['image'] = $request->file('image')
                ->store('landing-page/hero', 'public');
        }

        $hero->update($validated);

        return redirect()
            ->route('admin.landing-page.hero')
            ->with('success', 'Hero section berhasil diperbarui.');
    }

    /**
     * Show the about section edit form and its advantages.
     */
    public function about()
    {
        return view('pages.admin.landing_page.about', [
            'about' => $this->aboutSection(),
        ]);
    }

    /**
     * Update the about section.
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'highlight' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => ['nullable', 'string', 'max:255'],
        ], [], [
            'title' => 'judul',
            'highlight' => 'teks sorotan',
            'description' => 'deskripsi',
            'button_text' => 'teks tombol',
            'button_url' => 'tautan tombol',
        ]);

        $this->aboutSection()->update($validated);

        return redirect()
            ->route('admin.landing-page.about')
            ->with('success', 'Section Tentang berhasil diperbarui.');
    }

    /**
     * Store a new about advantage.
     */
    public function storeAdvantage(Request $request)
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [], [
            'icon' => 'ikon',
            'title' => 'judul',
            'description' => 'deskripsi',
        ]);

        $about = $this->aboutSection();

        AboutAdvantage::create([
            ...$validated,
            'about_section_id' => $about->id,
            'sort_order' => $about->advantages()->max('sort_order') + 1,
        ]);

        return redirect()
            ->route('admin.landing-page.about')
            ->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    /**
     * Update an about advantage.
     */
    public function updateAdvantage(Request $request, AboutAdvantage $aboutAdvantage)
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ], [], [
            'icon' => 'ikon',
            'title' => 'judul',
            'description' => 'deskripsi',
        ]);

        $aboutAdvantage->update($validated);

        return redirect()
            ->route('admin.landing-page.about')
            ->with('success', 'Keunggulan berhasil diperbarui.');
    }

    /**
     * Remove an about advantage.
     */
    public function destroyAdvantage(AboutAdvantage $aboutAdvantage)
    {
        $aboutAdvantage->delete();

        return redirect()
            ->route('admin.landing-page.about')
            ->with('success', 'Keunggulan berhasil dihapus.');
    }

    /**
     * Show the footer settings edit form.
     */
    public function footer()
    {
        return view('pages.admin.landing_page.footer', [
            'footer' => $this->footerSetting(),
        ]);
    }

    /**
     * Update the footer settings.
     */
    public function updateFooter(Request $request)
    {
        $validated = $request->validate([
            'description' => ['required', 'string'],
            'address' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'copyright' => ['nullable', 'string', 'max:255'],
        ], [], [
            'description' => 'deskripsi',
            'address' => 'alamat',
            'email' => 'email',
            'phone' => 'nomor telepon',
            'facebook' => 'tautan Facebook',
            'instagram' => 'tautan Instagram',
            'twitter' => 'tautan Twitter / X',
            'youtube' => 'tautan YouTube',
            'copyright' => 'teks copyright',
        ]);

        $this->footerSetting()->update($validated);

        return redirect()
            ->route('admin.landing-page.footer')
            ->with('success', 'Footer berhasil diperbarui.');
    }

    /**
     * Get the single hero section record.
     */
    private function heroSection(): HeroSection
    {
        return HeroSection::setting();
    }

    /**
     * Get the single about section record.
     */
    private function aboutSection(): AboutSection
    {
        return AboutSection::setting();
    }

    /**
     * Get the single footer settings record.
     */
    private function footerSetting(): FooterSetting
    {
        return FooterSetting::setting();
    }
}

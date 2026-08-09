<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TipsArticle;
use App\Models\TipsArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TipsArticleController extends Controller
{
    /**
     * Ensure the authenticated user owns the article.
     */
    private function authorizeArticle(TipsArticle $tipsArticle): void
    {
        if ($tipsArticle->user_id !== auth()->id()) {
            abort(403, 'Anda tidak memiliki akses ke artikel ini.');
        }
    }

    /**
     * Display a listing of the user's own articles.
     */
    public function index(Request $request)
    {
        $query = TipsArticle::with('category')
            ->where('user_id', auth()->id());

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('category')) {
            $query->where('tips_article_category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tipsArticles = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = TipsArticleCategory::orderBy('name')->get();

        return view('pages.user.tips_articles.index', compact('tipsArticles', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TipsArticleCategory::orderBy('name')->get();

        return view('pages.user.tips_articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tips_article_category_id' => 'required|exists:tips_article_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('tips-articles', 'public');
        }

        $validated['slug'] = $this->makeUniqueSlug($request->title);

        $validated['user_id'] = auth()->id();

        $validated['status'] = 'draft';

        TipsArticle::create($validated);

        return redirect()
            ->route('user.tips-articles.index')
            ->with('success', 'Tips & Artikel berhasil ditambahkan sebagai draft.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipsArticle $tipsArticle)
    {
        $this->authorizeArticle($tipsArticle);

        $categories = TipsArticleCategory::orderBy('name')->get();

        return view('pages.user.tips_articles.edit', compact('tipsArticle', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipsArticle $tipsArticle)
    {
        $this->authorizeArticle($tipsArticle);

        $validated = $request->validate([
            'tips_article_category_id' => 'required|exists:tips_article_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($tipsArticle->thumbnail) {
                Storage::disk('public')->delete($tipsArticle->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('tips-articles', 'public');
        }

        $validated['slug'] = $this->makeUniqueSlug($request->title, $tipsArticle->id);

        $tipsArticle->update($validated);

        return redirect()
            ->route('user.tips-articles.index')
            ->with('success', 'Tips & Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipsArticle $tipsArticle)
    {
        $this->authorizeArticle($tipsArticle);

        if ($tipsArticle->thumbnail) {
            Storage::disk('public')->delete($tipsArticle->thumbnail);
        }

        $tipsArticle->delete();

        return redirect()
            ->route('user.tips-articles.index')
            ->with('success', 'Tips & Artikel berhasil dihapus.');
    }

    /**
     * Generate a unique slug from the given title.
     */
    private function makeUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $count = 2;

        while (TipsArticle::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $base.'-'.$count++;
        }

        return $slug;
    }
}

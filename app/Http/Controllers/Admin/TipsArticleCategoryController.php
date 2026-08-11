<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipsArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TipsArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TipsArticleCategory::withCount('tipsArticles');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $tipsArticlesCategories = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.tips_articles_categories.index', compact('tipsArticlesCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.tips_articles_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:tips_article_categories,name',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        TipsArticleCategory::create($validated);

        return redirect()
            ->route('admin.tips-articles-categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipsArticleCategory $tipsArticleCategory)
    {
        return view('pages.admin.tips_articles_categories.edit', compact('tipsArticleCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipsArticleCategory $tipsArticleCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tips_article_categories,name,' . $tipsArticleCategory->id,
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $tipsArticleCategory->update($validated);

        return redirect()
            ->route('admin.tips-articles-categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipsArticleCategory $tipsArticleCategory)
    {
        $tipsArticleCategory->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}

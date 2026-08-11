<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = RecipeCategory::withCount('recipes');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $recipeCategories = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pages.admin.recipe_categories.index', compact('recipeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.recipe_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:recipe_categories,name',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        RecipeCategory::create($validated);

        return redirect()
            ->route('admin.recipe-categories.index')
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
    public function edit(RecipeCategory $recipeCategory)
    {
        return view('pages.admin.recipe_categories.edit', compact('recipeCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeCategory $RecipeCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:recipe_categories,name,' . $RecipeCategory->id,
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $RecipeCategory->update($validated);

        return redirect()
            ->route('admin.recipe-categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeCategory $RecipeCategory)
    {
        $RecipeCategory->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}

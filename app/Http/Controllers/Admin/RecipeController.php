<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Recipe::with(['category', 'user']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('category')) {
            $query->where('recipe_category_id', $request->category);
        }

        $recipes = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = RecipeCategory::orderBy('name')->get();

        return view('pages.admin.recipes.index', compact('recipes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = RecipeCategory::orderBy('name')->get();

        return view('pages.admin.recipes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'recipe_category_id' => 'required|exists:recipe_categories,id',
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('recipes', 'public');
        }

        $validated['user_id'] = auth()->id();

        $validated['status'] = 'publish';

        Recipe::create($validated);

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Resep berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        $categories = RecipeCategory::orderBy('name')->get();

        return view('pages.admin.recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'recipe_category_id' => 'required|exists:recipe_categories,id',
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,publish',
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }

            $validated['image'] = $request->file('image')
                ->store('recipes', 'public');
        }

        $recipe->update($validated);

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Resep berhasil diperbarui.');
    }

    /**
     * Publish / unpublish a recipe.
     */
    public function toggleStatus(Recipe $recipe)
    {
        $recipe->update([
            'status' => $recipe->status === 'publish' ? 'draft' : 'publish',
        ]);

        return back()->with('success', 'Status resep berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Resep berhasil dihapus.');
    }
}

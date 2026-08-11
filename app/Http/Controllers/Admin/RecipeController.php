<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Services\MealDBService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function __construct(
        private readonly MealDBService $mealdb,
    ) {
    }
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

        $import = session('mealdb_import');

        return view('pages.admin.recipes.create', compact('categories', 'import'));
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
            'image_url' => 'nullable|url|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('recipes', 'public');
        } elseif ($request->filled('image_url')) {
            $path = $this->mealdb->downloadImage($request->input('image_url'));

            if ($path) {
                $validated['image'] = $path;
            }
        }

        $validated['user_id'] = auth()->id();

        $validated['status'] = 'publish';

        Recipe::create($validated);

        session()->forget('mealdb_import');

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


    public function import(string $mealId)
    {
        $result = $this->mealdb->lookup($mealId);

        if ($result['error'] !== null) {
            return redirect()
                ->route('admin.recipes.index')
                ->with('error', 'Gagal mengambil data referensi resep dari TheMealDB.');
        }

        if ($result['recipe'] === null) {
            return redirect()
                ->route('admin.recipes.index')
                ->with('error', 'Resep tidak ditemukan di TheMealDB.');
        }

        $recipe = $result['recipe'];

        session()->put('mealdb_import', [
            'meal_id' => $recipe['id'],
            'title' => $recipe['title'],
            'description' => Str::limit(
                (string) strtok((string) $recipe['instructions'], "."),
                180,
            ),
            'ingredients' => collect($recipe['ingredients'])
                ->map(fn (string $ingredient) => '- '.$ingredient)
                ->implode("\n"),
            'steps' => collect($recipe['steps'])
                ->map(fn (string $step, int $index) => ($index + 1).'. '.$step)
                ->implode("\n"),
            'image_url' => $recipe['image'],
        ]);

        return redirect()
            ->route('admin.recipes.create')
            ->with('success', 'Data resep dari TheMealDB telah diisi. Periksa kembali lalu simpan.');
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MealDBService
{
    protected string $baseUrl;

    protected int $timeout;

    protected int $maxResults;

    public function __construct()
    {
        $this->baseUrl = rtrim((string) config('mealdb.base_url'), '/');
        $this->timeout = (int) config('mealdb.timeout', 10);
        $this->maxResults = (int) config('mealdb.max_results', 12);
    }

    public function search(string $keyword): array
    {
        if (trim($keyword) === '') {
            return ['recipes' => [], 'error' => null];
        }

        try {
            $response = Http::baseUrl($this->baseUrl)
                ->timeout($this->timeout)
                ->get('search.php', ['s' => $keyword]);

            if (! $response->successful()) {
                return ['recipes' => [], 'error' => 'Gagal mengambil data referensi resep.'];
            }

            $meals = $response->json('meals');

            if (! is_array($meals)) {
                return ['recipes' => [], 'error' => null];
            }

            $recipes = array_map(
                fn (array $meal) => $this->normalize($meal),
                array_slice($meals, 0, $this->maxResults),
            );

            return ['recipes' => $recipes, 'error' => null];
        } catch (\Throwable $e) {
            return ['recipes' => [], 'error' => 'Gagal mengambil data referensi resep.'];
        }
    }

    public function lookup(string $mealId): array
    {
        try {
            $response = Http::baseUrl($this->baseUrl)
                ->timeout($this->timeout)
                ->get('lookup.php', ['i' => $mealId]);

            if (! $response->successful()) {
                return ['recipe' => null, 'error' => 'Gagal mengambil data referensi resep.'];
            }

            $meals = $response->json('meals');

            if (! is_array($meals) || empty($meals)) {
                return ['recipe' => null, 'error' => null];
            }

            return ['recipe' => $this->normalize($meals[0]), 'error' => null];
        } catch (\Throwable $e) {
            return ['recipe' => null, 'error' => 'Gagal mengambil data referensi resep.'];
        }
    }

    public function downloadImage(?string $url): ?string
    {
        if (! $url) {
            return null;
        }

        try {
            $response = Http::timeout($this->timeout)->get($url);

            if (! $response->successful()) {
                return null;
            }

            $contentType = (string) $response->header('Content-Type');

            $extension = match (true) {
                str_contains($contentType, 'png') => 'png',
                str_contains($contentType, 'webp') => 'webp',
                str_contains($contentType, 'jpeg'), str_contains($contentType, 'jpg') => 'jpg',
                default => 'jpg',
            };

            $path = 'recipes/'.Str::random(20).'.'.$extension;

            Storage::disk('public')->put($path, $response->body());

            return $path;
        } catch (\Throwable $e) {
            return null;
        }
    }

    protected function normalize(array $meal): array
    {
        $ingredients = [];

        for ($i = 1; $i <= 20; $i++) {
            $name = trim((string) ($meal['strIngredient'.$i] ?? ''));
            $measure = trim((string) ($meal['strMeasure'.$i] ?? ''));

            if ($name === '') {
                continue;
            }

            $ingredients[] = $measure !== '' ? "{$measure} {$name}" : $name;
        }

        $steps = array_values(array_filter(
            array_map('trim', preg_split('/\r?\n+/', (string) ($meal['strInstructions'] ?? '')) ?: []),
            fn (string $line) => $line !== '',
        ));

        return [
            'id' => $meal['idMeal'] ?? null,
            'title' => $meal['strMeal'] ?? 'Resep Tanpa Judul',
            'category' => $meal['strCategory'] ?? null,
            'area' => $meal['strArea'] ?? null,
            'instructions' => $meal['strInstructions'] ?? '',
            'image' => $meal['strMealThumb'] ?? null,
            'youtube' => $meal['strYoutube'] ?? null,
            'source' => $meal['strSource'] ?? null,
            'tags' => $meal['strTags'] ?? null,
            'ingredients' => $ingredients,
            'steps' => $steps,
        ];
    }
}

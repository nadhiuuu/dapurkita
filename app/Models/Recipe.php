<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_category_id',
        'user_id',
        'title',
        'description',
        'ingredients',
        'steps',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(RecipeCategory::class, 'recipe_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

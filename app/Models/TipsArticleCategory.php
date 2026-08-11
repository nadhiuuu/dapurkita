<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipsArticleCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tipsArticles(): HasMany
    {
        return $this->hasMany(TipsArticle::class);
    }
}

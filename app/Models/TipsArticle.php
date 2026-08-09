<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipsArticle extends Model
{
    protected $fillable = [
        'user_id',
        'tips_article_category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            TipsArticleCategory::class,
            'tips_article_category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

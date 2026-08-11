<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutAdvantage extends Model
{
    protected $fillable = [
        'about_section_id',
        'icon',
        'title',
        'description',
        'sort_order',
    ];

    public function aboutSection(): BelongsTo
    {
        return $this->belongsTo(AboutSection::class);
    }
}

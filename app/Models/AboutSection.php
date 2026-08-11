<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'highlight',
        'description',
        'button_text',
        'button_url',
    ];

    public function advantages(): HasMany
    {
        return $this->hasMany(AboutAdvantage::class)->orderBy('sort_order');
    }

    /**
     * Get (or create) the single about section record.
     */
    public static function setting(): self
    {
        return static::firstOrCreate([], [
            'title' => 'Lebih dari sekadar',
            'highlight' => 'kumpulan resep',
            'description' => 'DapurKita adalah platform berbagi resep dan tips memasak yang lahir dari kecintaan terhadap masakan rumahan.',
            'button_text' => 'Mulai Berbagi',
            'button_url' => '/registrasi',
        ]);
    }
}

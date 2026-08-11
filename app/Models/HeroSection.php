<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $fillable = [
        'title',
        'highlight',
        'description',
        'image',
        'button_text',
        'button_url',
    ];

    /**
     * Get (or create) the single hero section record.
     */
    public static function setting(): self
    {
        return static::firstOrCreate([], [
            'title' => 'Temukan inspirasi,',
            'highlight' => 'bagikan kreasi',
            'description' => 'Temukan inspirasi dari berbagai kreasi dan bagikan kreasi Anda sendiri untuk menginspirasi orang lain.',
            'button_text' => 'Cari Resep',
            'button_url' => '/resep',
        ]);
    }
}

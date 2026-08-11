<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $fillable = [
        'description',
        'address',
        'email',
        'phone',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'copyright',
    ];

    /**
     * Get (or create) the single footer settings record.
     */
    public static function setting(): self
    {
        return static::firstOrCreate([], [
            'description' => 'Platform resep masakan dan tips dapur harian untuk membantu Anda menyajikan hidangan lezat dan sehat bersama keluarga.',
            'copyright' => '© '.date('Y').' DapurKita. Semua Hak Cipta Dilindungi.',
        ]);
    }
}

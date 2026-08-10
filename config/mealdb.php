<?php

return [

    /*
    |--------------------------------------------------------------------------
    | TheMealDB API
    |--------------------------------------------------------------------------
    |
    | Base URL API TheMealDB. Key development "1" hanya untuk pengembangan
    | dan edukasi. Untuk production, gunakan key resmi sesuai dokumentasi:
    | https://www.themealdb.com/documentation
    |
    */

    'base_url' => env('MEALDB_BASE_URL', 'https://www.themealdb.com/api/json/v1/1'),

    /*
    | Batas waktu (detik) setiap request HTTP ke TheMealDB.
    */
    'timeout' => (int) env('MEALDB_TIMEOUT', 10),

    /*
    | Jumlah maksimal hasil referensi dari TheMealDB yang ditampilkan.
    */
    'max_results' => (int) env('MEALDB_MAX_RESULTS', 12),
];

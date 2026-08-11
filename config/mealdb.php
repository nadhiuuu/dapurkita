<?php

return [

    'base_url' => env('MEALDB_BASE_URL', 'https://www.themealdb.com/api/json/v1/1'),

    'timeout' => (int) env('MEALDB_TIMEOUT', 10),

    'max_results' => (int) env('MEALDB_MAX_RESULTS', 12),
];

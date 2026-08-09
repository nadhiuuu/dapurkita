<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tips_articles', function (Blueprint $table) {
            $table->foreignId('tips_article_category_id')
                ->after('id')
                ->constrained('tips_article_categories')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->after('tips_article_category_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('thumbnail')->nullable();
            $table->enum('status', ['draft', 'publish'])
                ->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tips_articles', function (Blueprint $table) {
            $table->dropForeign(['tips_article_category_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'tips_article_category_id',
                'user_id',
                'title',
                'slug',
                'content',
                'thumbnail',
                'status',
            ]);
        });
    }
};

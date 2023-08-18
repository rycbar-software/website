<?php

use App\Enum\ArticleStatusEnum;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->char('status', 1)->default(ArticleStatusEnum::DRAFT->value);
            $table->string('title');
            $table->string('name');
            $table->string('slug');
            $table->integer('views_count')->default(0);
            $table->integer('sort')->default(500);
            $table->text('preview_text');
            $table->text('detail_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

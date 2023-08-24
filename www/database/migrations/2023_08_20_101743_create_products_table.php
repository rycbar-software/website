<?php

use App\Enum\StatusEnum;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name', 255);
            $table->string('slug', 255);
            $table->char('status', 1)->default(StatusEnum::DRAFT->value);
            $table->integer('sort')->default(500);
            $table->text('preview_text')->nullable();
            $table->text('detail_text')->nullable();

            $table->string('external_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

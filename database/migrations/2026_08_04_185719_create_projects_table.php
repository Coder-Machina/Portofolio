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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->unique();
            $table->string('slug')->unique();        
            $table->string('short_desc');
            $table->text('full_desc');
            $table->json('tech_stack');
            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('featured')->default(false);
            $table->integer('order')->default(0);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

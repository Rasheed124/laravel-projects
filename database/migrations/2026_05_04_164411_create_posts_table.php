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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->index()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique(); // Unique already creates an index
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('views')->default(0)->index(); // Indexed for "Most Popular" queries
            $table->unsignedBigInteger('likes')->default(0);
            $table->boolean('is_featured')->default(false)->index(); // Indexed for featured sections
            $table->enum('status', ['draft', 'published'])->default('draft')->index();
            $table->timestamp('published_at')->nullable();
            $table->softDeletes(); // Adds deleted_at
            $table->timestamps();  // Adds created_at and updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

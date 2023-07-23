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
        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('category_id');

            $table->timestamps();

            $table->index('book_id', 'book_category_book_idx');
            $table->index('category_id', 'book_category_category_idx');

            $table->foreign('book_id', 'book_category_book_fk')->on('books')->references('id');
            $table->foreign('category_id', 'book_category_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_categories');
    }
};

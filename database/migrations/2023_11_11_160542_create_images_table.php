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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedInteger('book_id');
            $table->timestamps();
            $table->foreign('book_id')->references('id')->on('books');
        });
        Schema::table('books', function (Blueprint $table) {
            $table->string('status')->default('draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};

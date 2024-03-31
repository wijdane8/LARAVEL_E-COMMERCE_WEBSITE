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
        Schema::table('productDetails', function (Blueprint $table) {
            $table->string('thumbnail');
            $table->json('image');
            $table->string('brand');
            $table->float('discountPercentage');
            $table->string('rate');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productDetails', function (Blueprint $table) {
            //
        });
    }
};

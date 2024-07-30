<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keyvalues', function (Blueprint $table) {
            $table->id();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->string('composition')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
            $table->string('seo_description')->nullable();
            $table->unsignedBigInteger('product_weight');
            $table->unsignedBigInteger('product_width');
            $table->unsignedBigInteger('product_height');
            $table->unsignedBigInteger('product_length');
            $table->unsignedBigInteger('package_weight');
            $table->unsignedBigInteger('package_width');
            $table->unsignedBigInteger('package_height');
            $table->unsignedBigInteger('package_length');
            $table->string('product_category');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keyvalues');
    }
};

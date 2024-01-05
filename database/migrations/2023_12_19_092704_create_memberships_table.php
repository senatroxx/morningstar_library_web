<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image')->nullable();
            $table->float('balance');
            $table->float('price');
            $table->float('discount_price')->nullable();
            $table->integer('max_borrow_count');
            $table->integer('max_borrow_weeks');
            $table->integer('fine_per_weeks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('memberships');
    }
};

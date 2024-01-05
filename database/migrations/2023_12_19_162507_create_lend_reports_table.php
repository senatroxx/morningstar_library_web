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
        Schema::create('lend_reports', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->float('fine')->default(0);
            $table->string('report_type');
            $table->string('bill_type');
            $table->string('status');
            $table->foreignId('lend_id')->constrained('lends')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('lend_reports');
    }
};

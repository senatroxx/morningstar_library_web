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
        Schema::table('lends', function (Blueprint $table) {
            $table->foreignId('user_address_id')->after('user_id')->nullable()->constrained('user_addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::table('lends', function (Blueprint $table) {
            //
        });
    }
};

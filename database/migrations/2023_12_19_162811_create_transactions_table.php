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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id');
            $table->string('invoice_url');
            $table->string('payment_method')->nullable();
            $table->float('amount');
            $table->string('status');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('membership_id')->nullable()->constrained('memberships')->onDelete('cascade');
            $table->foreignId('lend_id')->nullable()->constrained('lends')->onDelete('cascade');
            $table->foreignId('lend_report_id')->nullable()->constrained('lend_reports')->onDelete('cascade');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists('transactions');
    }
};

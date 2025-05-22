<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('debt_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->foreignId('debt_id')->constrained('debts')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->date('payment_date');
            $table->timestamps();
            $table->index(['payment_date']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt_payments');
    }
};

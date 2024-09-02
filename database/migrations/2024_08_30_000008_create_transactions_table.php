<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transactionable_id');
            $table->string('transactionable_type');
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['debit', 'credit']);
            $table->date('transaction_date');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->index(['transactionable_type', 'transactionable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
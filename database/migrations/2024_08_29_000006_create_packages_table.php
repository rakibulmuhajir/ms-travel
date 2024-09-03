<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('passenger_id')->constrained();
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('bill_id')->nullable();
            $table->decimal('total_cost', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status');
            $table->boolean('has_visa')->default(false);
            $table->boolean('has_ticket')->default(false);
            $table->boolean('has_hotel')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('pnr');
            $table->string('airline');
            $table->unsignedInteger('number_of_people');
            $table->dateTime('outbound');
            $table->dateTime('inbound')->nullable();
            $table->decimal('cost', 10, 2);
            $table->decimal('price', 10, 2);
            $table->foreignId('vendor_id')->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

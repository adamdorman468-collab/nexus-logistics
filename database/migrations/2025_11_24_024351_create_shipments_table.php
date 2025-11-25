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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique();
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('receiver_name');
            $table->text('receiver_address');
            $table->string('receiver_phone');
            $table->enum('status', ['pending', 'picked_up', 'in_transit', 'delivered', 'returned'])->default('pending');
            $table->decimal('weight_kg', 8, 2)->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
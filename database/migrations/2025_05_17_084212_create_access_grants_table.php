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
        Schema::create('access_grants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('id')->on('inventory')->onDelete('cascade');

             $table->timestamp('granted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_grants');
    }
};

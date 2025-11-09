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
        Schema::create('pending_webhooks', function (Blueprint $table) {
            $table->id();

            $table->string('session_id')->unique();
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('status')->default('waiting'); // waiting | processed
            $table->json('payload')->nullable(); // optional: to store Stripe event data


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_webhooks');
    }
};

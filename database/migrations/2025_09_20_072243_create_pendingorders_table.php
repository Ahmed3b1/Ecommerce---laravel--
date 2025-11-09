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
        Schema::create('pendingorders', function (Blueprint $table) {
            $table->id();

            // بيانات العميل
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('note')->nullable();

            // ربط باليوزر لو في Auth
            $table->unsignedBigInteger('user_id')->nullable();

            // Stripe Session
            $table->string('session_id')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendingorders');
    }
};

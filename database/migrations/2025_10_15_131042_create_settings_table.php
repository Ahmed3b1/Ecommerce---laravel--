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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();


             // 🏪 General Settings
            $table->string('store_name')->nullable();
            $table->string('store_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('currency', 10)->default('USD');
            $table->string('language', 10)->default('en');
            $table->text('address')->nullable();
            $table->string('logo')->nullable();

            // 💳 Payment Settings
            $table->boolean('stripe_enabled')->default(false);
            $table->string('stripe_key')->nullable();
            $table->boolean('paypal_enabled')->default(false);

            // 🚚 Shipping Settings
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->decimal('free_shipping_above', 10, 2)->default(0);

            // 📧 Email Settings
            $table->string('sender_name')->nullable();
            $table->string('sender_email')->nullable();

            // 👤 Admin Settings
            $table->string('admin_email')->nullable();
            $table->string('admin_password')->nullable();

            // 🔍 SEO Settings
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

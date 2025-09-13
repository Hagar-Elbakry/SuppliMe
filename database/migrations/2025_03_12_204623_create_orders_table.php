<?php

use App\Models\Account;
use App\Models\Product;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'processing', 'completed'])->default('pending');
            $table->decimal('total_price');
            $table->decimal('shipping_cost');
            $table->enum('payment_method', ['cash', 'Visa']);
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->foreignIdFor(User::class)->constrained()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

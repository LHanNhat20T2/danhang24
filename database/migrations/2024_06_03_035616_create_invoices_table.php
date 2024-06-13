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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('reservation_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->double('total');
            $table->integer('product_qty');
            $table->string('payment_method')->nullable();
            $table->timestamp('payment_approve_date')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('note')->nullable();
            $table->string('payment_status')->default('Chưa thanh toán');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

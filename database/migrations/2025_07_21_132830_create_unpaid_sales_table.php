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
        Schema::create('unpaid_sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->string('client');
            $table->string('description')->nullable();
            $table->enum('status', ['paid','unpaid']);
            $table->string('telephone');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unpaid_sales');
    }
};

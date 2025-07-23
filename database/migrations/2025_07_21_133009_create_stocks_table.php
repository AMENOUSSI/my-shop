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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('quantity');
            $table->decimal('total_purchasing_price', 15, 2);
            $table->decimal('unit_selling_price', 15, 2);
            $table->decimal('unit_purchasing_price', 15, 2);
            $table->decimal('total_selling_price', 15, 2);
            $table->doubdecimalle('interest', 15, 2);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};

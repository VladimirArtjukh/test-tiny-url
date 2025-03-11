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
        Schema::create('viewed_products', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->timestamp('viewed_at');
            $table->index(['session_id', 'viewed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewed_products');
    }
};

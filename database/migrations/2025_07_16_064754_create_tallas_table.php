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
        Schema::create('tallas', function (Blueprint $table) {
        $table->id('id_talla');
        $table->unsignedBigInteger('id_producto');
        $table->string('talla');
        $table->integer('stock')->default(0);
        $table->timestamps();

        $table
            ->foreign('id_producto')
            ->references('id_producto')
            ->on('productos')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tallas');
    }
};

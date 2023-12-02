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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre'); // Pan Concha
            $table->string('descripcion'); // Pan Azucarado
            $table->string('tipo'); // Pan Dulce
            $table->text('imagen'); // Titulo de imagen
            $table->integer('stock'); // Cuanto hay
            $table->decimal('precio'); // Precio
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombre', 30);
            $table->decimal('precio', 8, 2, true);
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('estado_id')->constrained('estados');
            $table->string('descripcion', 255);
            $table->boolean('reservado')->nullable();
            $table->boolean('envio')->nullable();
            $table->boolean('vendido')->nullable();
            //añadir etiquetas
            //añadir fotos
            //añadir ubicacion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};

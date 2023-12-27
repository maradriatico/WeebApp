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
        Schema::create('producto_fotos', function (Blueprint $table) {

            $table->id();
            $table->foreignId('producto_id')->constrained('productos');
            $table->text('foto_1');
            $table->text('foto_2')->nullable();
            $table->text('foto_3')->nullable();
            $table->text('foto_4')->nullable();
            $table->text('foto_5')->nullable();
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
        {
            Schema::dropIfExists('producto_fotos');
        }

    }
};

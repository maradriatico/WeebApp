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
        Schema::create('chat_mensajes', function (Blueprint $table) {
            $table->foreignId('user1_id')->constrained('users');
            $table->foreignId('user2_id')->constrained('users');
            $table->foreignId('producto_id')->constrained('productos');
            $table->text('mensaje');
            $table->timestamps();

            $table->primary(['user1_id', 'user2_id', 'producto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_mensajes');
    }
};

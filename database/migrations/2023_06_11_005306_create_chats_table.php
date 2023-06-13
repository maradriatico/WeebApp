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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dueño_id')->constrained('users');
            $table->foreignId('interesado_id')->constrained('users');
            $table->foreignId('producto_id')->constrained('productos');
            $table->timestamps();
        });

        Schema::table('chat_mensajes', function (Blueprint $table) {
            $table->foreignId('chat_id')->constrained('chats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};

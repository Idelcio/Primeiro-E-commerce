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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments("id");
            $table->datetime("datapedido"); // Corrigido para 'datetime' no singular
            $table->string("status", 4);
            $table->integer("usuario_id")->unsigned(); // unsigned = somente valores positivos
            $table->timestamps();

            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

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
        Schema::create('questao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teste_id')->constrained('teste')->onDelete('cascade');
            $table->text("enunciado");
            $table->string("opcao_a");
            $table->string("opcao_b");
            $table->string("opcao_c");
            $table->string("opcao_d");
            $table->string("opcao_e");
            $table->char("opcao_certa", 1);
            $table->decimal("valor_questao", 5, 2);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questao');
    }
};

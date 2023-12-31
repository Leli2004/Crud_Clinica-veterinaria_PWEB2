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
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->string('data',12);
            $table->string('hora',6);
            $table->string('tipo',100);
            $table->string('descricao',300);
            $table->foreignId('animal_id')->nullable()
                ->constrained('animal')->default(null)->onDelete('cascade');
            $table->foreignId('colaborador_id')->nullable()
                ->constrained('colaborador')->default(null)->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};

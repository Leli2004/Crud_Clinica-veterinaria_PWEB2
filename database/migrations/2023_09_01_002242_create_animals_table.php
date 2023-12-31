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
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string('peso',8);
            $table->string('porte',7);
            $table->string('raca',20);
            $table->foreignId('tutor_id')->nullable()
            ->constrained('tutor')->default(null)->onDelete('cascade');
            $table->string('imagem',150)->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal');
    }
};

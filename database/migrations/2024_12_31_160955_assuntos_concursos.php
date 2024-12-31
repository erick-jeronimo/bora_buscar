<?php

use App\Models\Assunto;
use App\Models\Concurso;
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
        Schema::create('assuntos_concursos', function (Blueprint $table) {
            $table->foreignIdFor(Concurso::class);
            $table->foreignIdFor(Assunto::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assuntos_concursos');
    }
};

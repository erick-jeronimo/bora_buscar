<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horas_diarias', function (Blueprint $table) {
            $table->id();
            $table->string('dia')
                ->comment('dia da semana');
            $table->integer('quantidade_horas')
                ->comment('quantidade de horas que o aluno tem disponível');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horas_diarias');
    }
};

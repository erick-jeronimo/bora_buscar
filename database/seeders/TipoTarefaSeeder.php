<?php

namespace Database\Seeders;

use App\Models\TipoTarefa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoTarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoTarefa::insert([
            ['nome' => 'Leitura de Lei'],
            ['nome' => 'Leitura de PDF'],
            ['nome' => 'Vídeo'],
            ['nome' => 'Questões']
        ]);
    }
}

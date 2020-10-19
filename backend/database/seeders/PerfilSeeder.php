<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Perfil;

class PerfilSeeder extends Seeder {

    /**
     * Criando os Perfis padrão da API
     */
    public function run() {
        Perfil::create(['id' => 1, 'description' => 'Admin']);
        Perfil::create(['id' => 2, 'description' => 'User']);
        $this->command->info('Perfis created');
    }
}

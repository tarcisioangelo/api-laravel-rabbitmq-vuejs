<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Profile;

class ProfileSeeder extends Seeder {

    /**
     * Criando os Profiles padrão da API
     */
    public function run() {
        Profile::create(['id' => 1, 'description' => 'Admin']);
        Profile::create(['id' => 2, 'description' => 'User']);
        $this->command->info('Profiles created');
    }
}

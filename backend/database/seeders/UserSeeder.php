<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder {

    /**
     * Vamos criar um usuário Admin para nossa API
     */
    public function run() {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@api.com',
            'password' => 'admin',
            'id_profile' => 1
        ]);

        $this->command->info('User admin created');
    }
}

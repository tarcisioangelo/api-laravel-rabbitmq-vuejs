<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Criando as Categorias principais
     */
    public function run() {
        Category::create(['id' => 1, 'description' => 'Livros']);
        Category::create(['id' => 2, 'description' => 'Outros']);
        $this->command->info('Categories created');
    }
}

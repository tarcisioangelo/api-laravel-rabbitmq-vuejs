<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder {
    /**
     * Criando as Categorias principais
     */
    public function run() {
        Category::create(['id' => 1, 'description' => 'Books']);
        Category::create(['id' => 2, 'description' => 'Pencil']);
        $this->command->info('Categories created');
    }
}

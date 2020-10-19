<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {

    /**
     * Vamos criar 3 produtos
     */
    public function run() {
        Product::create([
            'id_user' => 1,
            'name' => 'Senhor dos Aneis',
            'description' => 'Em uma terra fantástica e única, um hobbit recebe de presente de seu tio um anel mágico e maligno que precisa ser destruído antes que caia nas mãos do mal. Para isso, o hobbit Frodo tem um caminho árduo pela frente, onde encontra perigo, medo e seres bizarros. Ao seu lado para o cumprimento desta jornada, ele aos poucos pode contar com outros hobbits, um elfo, um anão, dois humanos e um mago, totalizando nove pessoas que formam a Sociedade do Anel.',
            'price' => 79.90,
            'id_category' => 1
        ]);

        Product::create([
            'id_user' => 1,
            'name' => 'O Rei Leão',
            'description' => 'Traído e exilado de seu reino, o leãozinho Simba precisa descobrir como crescer e retomar seu destino como herdeiro real nas planícies da savana africana.',
            'price' => 29.90,
            'id_category' => 1
        ]);

        Product::create([
            'id_user' => 1,
            'name' => 'Gato de Botas',
            'description' => 'Antes de conhecer Shrek e sua turma, Gato de Botas vive uma grande aventura ao lado de Humpty Dumpty e Kitty Pata Mansa. Dispostos a roubar os feijões mágicos do casal fora da lei Jack e Jill, o trio quer mesmo é conseguir a famosa gansa que bota ovos de ouro. Porém, algumas coisas não estavam nos planos, e Gato vai descobrir, meio atrasado, que tem um grande problema pela frente para conseguir limpar o que ficou para trás: a sua honra.',
            'price' => 49.90,
            'id_category' => 1
        ]);

        $this->command->info('Products created');
    }
}

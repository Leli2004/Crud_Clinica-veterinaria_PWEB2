<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('produto')->insert([
                'nome'=>$faker->lastName,
                'tipo'=>$faker->word,
                'fornecedor_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
}

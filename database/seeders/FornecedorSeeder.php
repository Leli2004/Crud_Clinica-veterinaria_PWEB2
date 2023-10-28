<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('fornecedor')->insert([
                'nome'=>$faker->name,
                'cnpj'=>$faker->cpf,
                'telefone'=>$faker->phoneNumber,
                'endereco'=>$faker->streetAddress,
            ]);
        }
    }
}

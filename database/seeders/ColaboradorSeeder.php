<?php

namespace Database\Seeders;

//use\app\Models\Tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('colaborador')->insert([
                'nome'=>$faker->name,
                'cpf'=>$faker->cpf,
                'telefone'=>$faker->phoneNumber,
                'cargo'=>$faker->jobTitle,
            ]);
        }
    }
}

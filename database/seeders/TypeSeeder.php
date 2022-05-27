<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::insert([
            'people' => 'Pessoa Física',
        ]);

        Type::insert([
            'people' => 'Pessoa Jurifica',
        ]);
    }
}

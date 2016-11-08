<?php

use Illuminate\Database\Seeder;

class EstadosCivilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_civiles')->insert([
            ['descripcion' => 'Soltero/a'],
            ['descripcion' => 'Viudo/a'],
            ['descripcion' => 'Casado/a'],
            ['descripcion' => 'Divorciado/a']
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class CausasExistentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causas_existentes')->insert([
            ['descripcion' => 'Causa existente 1'],
            ['descripcion' => 'Causa existente 2'],
            ['descripcion' => 'Causa existente 3']
        ]);
    }
}

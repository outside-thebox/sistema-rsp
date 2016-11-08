<?php

use Illuminate\Database\Seeder;

class SituacionesLegalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situaciones_legales')->insert([
            ['descripcion' => 'Dispuesto'],
            ['descripcion' => 'Procesado'],
            ['descripcion' => 'Condenado']
        ]);
    }
}

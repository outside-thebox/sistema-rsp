<?php

use Illuminate\Database\Seeder;

class TiposDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_documentos')->insert([
            ['descripcion' => 'CI(Cédula de Identidad)'],
            ['descripcion' => 'CE(Cédula de Extranjería)'],
            ['descripcion' => 'Pas(Pasaporte)'],
            ['descripcion' => 'DNI(Documento Nacional de Identidad)'],
            ['descripcion' => 'LE(Libreta de Enrolamiento)'],
            ['descripcion' => 'LC(Libreta Cívica)'],
        ]);
    }
}

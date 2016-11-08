<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EstadosCivilesSeeder::class);
         $this->call(GenerosSeeder::class);
         $this->call(JurisdiccionesSeeder::class);
         $this->call(NacionalidadesSeeder::class);
         $this->call(ProfesionesSeeder::class);
         $this->call(SituacionesLegalesSeeder::class);
         $this->call(TiposDocumentosSeeder::class);
         $this->call(IngresosTableSeed::class);
    }
}

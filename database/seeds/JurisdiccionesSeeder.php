<?php

use Illuminate\Database\Seeder;

class JurisdiccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurisdicciones')->insert([
            ['descripcion' => 'Nacional'],
            ['descripcion' => 'Provincial'],
            ['descripcion' => 'Federal']
        ]);
    }
}

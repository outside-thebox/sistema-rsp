<?php

use Illuminate\Database\Seeder;
use App\Api\Entities\Mysql\Ingresos;
use Faker\Factory as Faker;

class IngresosTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRecords(2216);
    }

    public function createRecords($total)
    {
        /*$faker = Faker::create();

        for($i = 1;$i <= $total;$i++)
        {
            Ingresos::create([
                'fecha_ingreso' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'apellido_declarado' => $faker->lastName,
                'nombre_declarado' => $faker->firstNameMale,
                'tipo_documento_declarado_id' => $faker->numberBetween($min = 1, $max = 3),
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'nro_documento_declarado' => $faker->numberBetween($min = 8000000, $max = 40000000),
                'origen_documento_declarado' => $faker->streetName,
                'apellido_real' => $faker->lastName,
                'nombre_real' => $faker->firstNameMale,
                'tipo_documento_real_id' => $faker->numberBetween($min = 1, $max = 3),
                'nro_documento_real' => $faker->numberBetween($min = 8000000, $max = 40000000),
                'origen_documento_real' => $faker->streetName,
                'otros_nombres' => $faker->firstNameMale,
                'alias' => $faker->userName,
                'nacionalidad_id' => $faker->numberBetween($min = 1, $max = 3),
                'lugar_nacimiento' => $faker->state,
                'genero_id' => $faker->numberBetween($min = 1, $max = 2),
                'estado_civil_id' => $faker->numberBetween($min = 1, $max = 3),
                'profesiones_id' => $faker->numberBetween($min = 1, $max = 3),
                'identificador_local' => $faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'),
                'fecha_egreso' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'reincidente' => $faker->numberBetween($min = 0, $max = 1),
                'curatela' => $faker->numberBetween($min = 0, $max = 1),
                'medida_curativa' => $faker->numberBetween($min = 0, $max = 1),
                'alojado' => $faker->numberBetween($min = 0, $max = 1),
                'jurisdiccion_id' => $faker->numberBetween($min = 1, $max = 3),
                'procesos_pendientes' => $faker->numberBetween($min = 0, $max = 1),
                'situacion_legal_id' => $faker->numberBetween($min = 1, $max = 3),
                'observaciones' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'causa_existente_id' => $faker->numberBetween($min = 1, $max = 3),
                'created_at' => $faker->dateTimeThisMonth($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now')

            ]);
        }*/

    }
}

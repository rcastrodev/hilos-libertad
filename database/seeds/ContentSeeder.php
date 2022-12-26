<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        /** Slider */
        Content::create([
            'section_id' => 1,
        ]);

        /** Card */
        Content::create([
            'section_id' => 2,
        ]);

        Content::create([
            'section_id' => 2,
        ]);

        /** Hilos Libertad */

        Content::create([
            'section_id' => 3,
        ]);


        /** Hilos Libertad */

        Content::create([
            'section_id' => 4,
        ]);

        /**
         * Fin home page
         */

        /** Empresa  */

       /** Slider */
       Content::create([
        'section_id' => 5,
        ]);

        /** Ribon */
        Content::create([
            'section_id' => 6,
        ]);

        /** Descripción de empresa */
        Content::create([
            'section_id' => 7,
        ]);
        
        /** Página cordón */

        Content::create([
            'section_id'=> 8,
        ]);

        /** Página Cinta */

        Content::create([
            'section_id' => 9,
        ]);

        /** Página Servicios */

        Content::create([
            'section_id' => 10,
        ]);

        Content::create([
            'section_id' => 10,
        ]);

        Content::create([
            'section_id' => 10,
        ]);

        Content::create([
            'section_id' => 11,
        ]);        

    }
}

<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home_id    = Page::where('name', 'home')->first()->id;
        $empresa_id = Page::where('name', 'empresa')->first()->id;
        /** Home */
        Section::create([
            'page_id' => $home_id,
            'name' => 'section_1'
        ]);

        Section::create([
            'page_id' => $home_id,
            'name' => 'section_2'
        ]);

        Section::create([
            'page_id' => $home_id,
            'name' => 'section_3'
        ]);

        Section::create([
            'page_id' => $home_id,
            'name' => 'section_4'
        ]);

        /** Empresa */

        Section::create([
            'page_id' => $empresa_id,
            'name' => 'section_1'
        ]);

        Section::create([
            'page_id' => $empresa_id,
            'name' => 'section_2'
        ]);

        Section::create([
            'page_id' => $empresa_id,
            'name' => 'section_3'
        ]);

        /** Cordon */

        Section::create([
            'page_id' => Page::where('name', 'cordon')->first()->id,
            'name' => 'section_1'
        ]);

        /** Cinta */

        Section::create([
            'page_id' => Page::where('name', 'cinta')->first()->id,
            'name' => 'section_1'
        ]);


        /** Servicios */

        Section::create([
            'page_id' => Page::where('name', 'servicios')->first()->id,
            'name' => 'section_1'
        ]);

        Section::create([
            'page_id' => Page::where('name', 'servicios')->first()->id,
            'name' => 'section_2'
        ]);
    }
}

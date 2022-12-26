<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::first()->id;

        Data::create([
            'company_id'=> $company_id,
            'address'   => 'Ricardo Güiraldes 5760, Billinghurst',
            'email'     => 'hiloslibertad@gmail.com',
            'phone1'    => '4-844-9534',
            'phone2'    => '4-844-2161',
            'logo_header'=> 'images/data/YPBCOYEt8AS7aAg46jhiKinG7wpRhT1RGvrMeFw7.svg',
            'logo_footer'=> 'images/data/380Ff1YdKXyyUST63N3W4MufLflADYGTu1AcrkH9.svg'
        ]);
    }
}

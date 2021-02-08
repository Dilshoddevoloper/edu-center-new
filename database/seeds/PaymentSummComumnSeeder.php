<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class PaymentSummComulnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 20; $i < 30; $i++)
        { 
        DB::table('students')->update([
                'payment_summ' =>rand(100,900),
            
        ]);
                
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class ScienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 9927; $i++)
        { 
        DB::table('students')
        ->where('id', $i)
        ->update([
                'science_id' =>rand(1,10),

        ]);
                
        }
    }
}

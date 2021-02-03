<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Student');
        
        for ($i = 30; $i < 793; $i++)
        { 
                $EduCenter = App\EduCenter::where('id', $i)->first();
                $rnd = rand(10,15);
                for ($j = 0; $j < $rnd; $j++)
                {
                    DB::table('students')->insert([
                        'center_id' =>$i,
                        'last_name' => $faker->userName,
                        'first_name' => $faker->userName,
                        'date_birth' => '2021-02-01',
                        'TIN' => '123456789',
                        'email' => $faker->safeEmail,
                        'address' => $faker->address,
                        'tell_number' => $faker->phoneNumber,
                        'region_id' => $EduCenter->region_id,
                        'city_id' => $EduCenter->city_id,
                        'science_id' => 3,
                
                    ]);
                }
        }
    }
}
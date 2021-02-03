<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class EduCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\EduCenter');
        
        for ($i = 15; $i < 208; $i++)
        { 
            $city_id = $i;
            if ( $city_id>10 and $city_id<=25) 
                $region_id = 8;
            else if ( $city_id>26 and $city_id<=38) 
                $region_id = 9;
            else if ( $city_id>39 and $city_id<=53) 
                $region_id = 10;
            else if ( $city_id>54 and $city_id<=64) 
                $region_id = 11;
            else if ( $city_id>65 and $city_id<=80) 
                $region_id = 12;
            else if ( $city_id>81 and $city_id<=100)
                $region_id = 13;
            else if ( $city_id>101 and $city_id<=114)
                $region_id = 14;
            else if ( $city_id>115 and $city_id<=126)
                $region_id = 15;
            else if ( $city_id>127 and $city_id<=137)
                $region_id = 16;
            else if ( $city_id>138 and $city_id<=156)
                $region_id = 17;
            else if ( $city_id>157 and $city_id<=172)
                $region_id = 18;
            else if ( $city_id>173 and $city_id<=184)
                $region_id = 19;
            else if ( $city_id>185 and $city_id<=196)
                $region_id = 21;
            else  // ( $city_id>197 and $city_id<=208)
                $region_id = 22;

                $rnd = rand(3,5);
                for ($j = 0; $j < $rnd; $j++)
                {
                    DB::table('edu_centers')->insert([
                        'name' => $faker->userName,
                        'head_name' => $faker->userName,
                        'email' => $faker->safeEmail,
                        'region_id' => $region_id,
                        'city_id' => $city_id,
                        'tell_number' => $faker->phoneNumber,
                        'address' => $faker->address,
                        'center_site' => $faker->userName,
                        'center_about' => $faker->userName,
                
                    ]);
                }
        }
    }
}
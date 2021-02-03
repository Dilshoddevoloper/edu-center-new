<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\User');
        
            for ($i = 100; $i < 9931; $i++)
            { 
                $student_id = $i;
                DB::table('users')->insert([
                'name' => $faker->userName,
                'login' => $faker->unique()->name,
                'role_id' => 3,
                'student_id' => $student_id,
                'password' => '$2y$10$YqGtjCIL51rCahkquaFJMefBNsIJpZRjChXE.TyHlYC8GmM1sMBDy',
                    
                ]);
            }
    }
}

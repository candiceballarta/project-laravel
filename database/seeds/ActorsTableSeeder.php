<?php

use Illuminate\Database\Seeder;
use App\actors;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $index){
            actors::create([
                'fname' => $faker->firstName($gender = 'others'|'male'|'female'),
                'lname' => $faker->lastName(),
                'notes' => $faker->words($nb = 4, $asText = true)
                ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
Use App\movies;

class MoviesTableSeeder extends Seeder
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
            movies::create([
                'title' => $faker->words($nb = 3, $asText = true),
                'plot' => $faker->sentences($nb = 2, $asText = true)    ,
                'year' => $faker->year()
                ]);
        }
    }
}

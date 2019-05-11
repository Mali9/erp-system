<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('book')->insert([ //,
                'bus_num'=>$faker->numberBetween($min = 200, $max = 10000),
                'prof_id'=>$faker->numberBetween($min = 2, $max = 100),

            ]);

        }
    }
}

<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([ //,
                'name' => $faker->name,
                'phone' => $faker->e164PhoneNumber,
                'address' => $faker->streetAddress,
                'active'=>$faker->numberBetween($min = 0, $max = 1),
                'card_id'=>$faker->numberBetween($min = 10000, $max = 100000),
                'point_id'=>$faker->numberBetween($min = 1, $max = 2),
                'foundation_id'=>$faker->numberBetween($min = 2, $max = 3),
            ]);
        }
    }
}

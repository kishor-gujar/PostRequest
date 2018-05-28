<?php

use Illuminate\Database\Seeder;

class RequestLineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('request_lines')->insert([ //,
                'line' => $faker->sentence(),
                'receiver_type_id' => $faker->numberBetween(1,20),
                'receiver_sub_type_id' => $faker->numberBetween(1,20),
                'request_line_description' => $faker->text(),
                'price_per_month' => $faker->randomNumber(),
                'status' => $faker->boolean()
            ]);
        }
    }
}
























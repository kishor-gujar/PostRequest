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

        $limit = 200;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('request_lines')->insert([ //,
                'line' => $faker->sentence(),
                'receiver_type' => $faker->word,
                'receiver_sub_type' => $faker->word,
                'request_line_description' => $faker->text(),
                'price_per_month' => $faker->randomNumber(),
                'status' => $faker->boolean()
            ]);
        }
    }
}
























<?php

use Illuminate\Database\Seeder;

class RequesterTableSeeder extends Seeder
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
            DB::table('requesters')->insert([ //,
                'number' => '234 '.$faker->phoneNumber,
                'email' => $faker->unique()->email,
                'name' => $faker->name(),
                'status' => $faker->boolean,
            ]);
        }
    }
}

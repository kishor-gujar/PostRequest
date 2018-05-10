<?php

use Illuminate\Database\Seeder;

class AdvertiserTableSeeder extends Seeder
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
            DB::table('advertisers')->insert([ //,
                'name' => $faker->name(),
                'number' => '234 '.$faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
                'contact_person' => $faker->name(),
                'status' => $faker->boolean()
            ]);
        }
    }
}




















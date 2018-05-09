<?php

use Illuminate\Database\Seeder;

class ReceiverTypeTableSeeder extends Seeder
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
            DB::table('receiver_types')->insert([ //,
                'type' => $faker->word(),
                'code' => $faker->word,
                'description' => $faker->text(),
                'status' => $faker->boolean()
            ]);
        }
    }
}

















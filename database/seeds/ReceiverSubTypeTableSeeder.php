<?php

use Illuminate\Database\Seeder;

class ReceiverSubTypeTableSeeder extends Seeder
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
        $receiverType = \App\ReceiverType::pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('receiver_sub_types')->insert([
                'text' => $faker->word,
                'receiver_type_id' => $faker->randomElement($receiverType),
                'description' => $faker->text(),
                'image' => $faker->imageUrl(),
                'status' => $faker->boolean()
            ]);
        }
    }
}















<?php

use Illuminate\Database\Seeder;

class SubmitedRequestTableSeeder extends Seeder
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
        $requesters = \App\Requester::pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('submited_requests')->insert([
                'sub_type' => $faker->word,
                'line' => $faker->paragraph(1),
                'requester_id' => $faker->randomElement($requesters),
                'state' => $faker->word,
                'town' => $faker->word,
                'updated_at' => $faker->date(),
                'created_at' => $faker->date(),
                'status' => $faker->boolean()
            ]);
        }
    }
}


















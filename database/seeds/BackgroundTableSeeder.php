<?php

use Illuminate\Database\Seeder;

class BackgroundTableSeeder extends Seeder
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
        $advertises = \App\Advertiser::pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('backgrounds')->insert([
                'name' => $faker->word,
                'advertiser_id' => $faker->randomElement($advertises),
                'image' => $faker->imageUrl(),
                'text' => $faker->text(),
                'external_link' => $faker->url,
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'status' => $faker->boolean()
            ]);
        }
    }
}



























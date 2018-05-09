<?php

use Illuminate\Database\Seeder;

class ReceiverTableSeeder extends Seeder
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
         $companies = \App\ReceiverCompany::pluck('id')->toArray();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('receivers')->insert([ //,
                'name' => $faker->name(),
                'email' => $faker->unique()->email,
                'contact_number' => '234 '.$faker->phoneNumber,
                'operation' => $faker->randomElement(['Independent', 'Company']),
                'company_id' => $faker->randomElement($companies),
                'description' => $faker->text(),
                'status' => $faker->boolean,
            ]);
        }
    }
}













<?php

use Illuminate\Database\Seeder;

class RequestLinkTableSeeder extends Seeder
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
        $receivers = \App\Receiver::pluck('id')->toArray();
        $receiver_types = \App\ReceiverType::pluck('id')->toArray();
        $receiver_sub_types = \App\ReceiverSubType::pluck('id')->toArray();
        $request_lines = \App\RequestLine::pluck('id')->toArray();
        $states = \App\State::pluck('id')->toArray();
        $towns = \App\Town::pluck('name')->toArray();
        $priorities = \App\Priority::pluck('id')->toArray();

        for ($i = 0; $i < $limit; $i++) {
            DB::table('request_links')->insert([ //,
                'receiver_type_id' => $faker->randomElement($receiver_types),
                'receiver_id' => $faker->randomElement($receivers),
                'receiver_sub_type_id' => $faker->randomElement($receiver_sub_types),
                'request_line_id' => $faker->randomElement($request_lines),
                'number' => '234 '.$faker->phoneNumber,
                'email' => $faker->email,
                'preferred_notification' => $faker->word,
                'status' => $faker->boolean(),
                'ref' => $faker->word,
                'state_id' => $faker->randomElement($states),
                'towns' => implode(',', $faker->randomElements($towns, random_int(1,5), false)),
                'priority_id' => $faker->randomElement($priorities),
                'duration' => $faker->date('m/d/Y'),
                'total_amount' => $faker->randomFloat(),

            ]);
        }
    }
}

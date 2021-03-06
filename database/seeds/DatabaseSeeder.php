<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             RequesterTableSeeder::class,
             SubmitedRequestTableSeeder::class,
             RequestLineTableSeeder::class,
             ReceiverTypeTableSeeder::class,
             ReceiverSubTypeTableSeeder::class,
             CompanyTableSeeder::class,
             ReceiverTableSeeder::class,
             StateTableSeeder::class,
             TownTableSeeder::class,
             PriorityTableSeeder::class,
             AdvertiserTableSeeder::class,
             BackgroundTableSeeder::class,
             RequestLinkTableSeeder::class,
         ]);

    }
}














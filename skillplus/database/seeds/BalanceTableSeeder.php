<?php

use Illuminate\Database\Seeder;
use App\Models\Balance;
use Faker\Factory as Faker;

class BalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

            for($index = 0; $index < 50; $index++) {
            Balance::create([
                "title" => $faker->jobTitle,
                "description" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                "type" => (rand(0, 1) == 1) ? 'add' : 'minus',
                "account" => $faker->creditCardType,
                "price" => $faker->randomNumber(2),
                "mode" => (rand(0, 1) == 1) ? 'auto' : 'user',
                "user_id" => 136,
                "exporter_id" => rand(0, 3),
                "create_at" => $faker->unixTime($max = 'now'),
                "update_at" => $faker->unixTime($max = 'now') 
            ]);
        }
    }
}
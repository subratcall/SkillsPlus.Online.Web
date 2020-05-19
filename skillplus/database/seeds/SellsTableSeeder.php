<?php

use Illuminate\Database\Seeder;
use App\Models\Sell;
use Faker\Factory as Faker;

class SellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($index = 0; $index < 30; $index ++) {
        Sell::create([
            "user_id" => 136,
            "buyer_id" => 136,
            "content_id" => 98,
            "transaction_id" => 35,
            "type" => "download",
            "mode" => "pay",
            "post_code" => $faker->word,
            "post_code_date" => $faker->unixTime($max = 'now'),
            "post_confirm" => $faker->word,
            "post_feedback" => 2,
            "create_at" => 1583917057,
            "view" => 1,
            "remain_time" => 1597937842
        ]);
    }
    }
}

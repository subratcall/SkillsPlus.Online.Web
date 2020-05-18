<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Channel;

class ChannelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($index = 0; $index < 50; $index ++) {
            Channel::create([
                "user_id" => 136,
                "username" => $faker->userName,
                "title" => $faker->jobTitle,
                "description" => $faker->sentence($nbWords = 6, $variableNbWords = true),
                "formal" => (rand(0, 1) == 1) ? 'ok' : 'none',
                "image" => $faker->imageUrl($width = 640, $height = 480),
                "avatar" => $faker->imageUrl($width = 640, $height = 480),
                "attach" => rand(0, 1),
                "mode" => (rand(0, 1) == 1) ? 'active' : 'none',
                "view" => rand(0, 50)
            ]);
        }
    }
}

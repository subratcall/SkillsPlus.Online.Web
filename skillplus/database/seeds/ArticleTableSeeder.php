<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use Faker\Factory as Faker;

class ArticleTableSeeder extends Seeder
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
            Article::create([
                "user_id" => 136,
                "image" => $faker->imageUrl($width = 640, $height = 480),
                "pre_text" => $faker->randomHtml(2,3),
                "text" => $faker->text($maxNbChars = 200),
                "title" => $faker->word,
                "mode" => $faker->word,
                "view" => $faker->randomNumber(2),
                "cat_id" => rand(0, 31),
                "create_at" => date("N")
            ]);
        }
    }
}
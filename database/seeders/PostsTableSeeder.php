<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Faker::create();
        $is_home_set = false; // Only one home page.
        $counter = 0;

        // Create 5 items with parent_id = 0, the first one is set as home.
        foreach (range(1, 5) as $index) {
            $counter++;

            switch ($counter) {
                case 1:
                    $title = 'Home';
                    break;
                case 2:
                    $title = 'Blog';
                    break;
                case 3:
                    $title = 'About';
                    break;
                case 4:
                    $title = 'Contact';
                    break;
                case 5:
                    $title = 'Privacy Policy';
                    break;
            }

            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'parent_id' => 0,
                'title' => $title,
                'title_slug' => Str::slug($title),
                'subtitle' => $faker->text(40),
                'introduction' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(2, false))),
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => $is_home_set ? 0 : ($is_home_set = 1),
                'is_published' => $is_home_set ? 1 : $faker->boolean,
                'is_feed' => $counter === 2 ? 1 : 0,
                'is_feed_item' => 0,
                'subs_paginated_by' => $counter === 2 ? 10 : 0,
                'published_at' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Child items.
        foreach (range(6, 15) as $index) {
            $title = $faker->text(20);
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'parent_id' => $faker->numberBetween(1, 5),
                'title' => $title,
                'title_slug' => Str::slug($title),
                'subtitle' => $faker->text(20),
                'introduction' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(2, false))),
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => 0,
                'is_feed' => 0,
                'is_feed_item' => 0,
                'subs_paginated_by' => 0,
                'is_published' => 1,
                'published_at' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // 2nd level child items.
        foreach (range(16, 20) as $index) {
            $title = $faker->text(20);
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'parent_id' => $faker->numberBetween(6, 15),
                'title' => $title,
                'title_slug' => Str::slug($title),
                'subtitle' => $faker->text(20),
                'introduction' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(2, false))),
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => 0,
                'is_feed' => 0,
                'is_feed_item' => 0,
                'subs_paginated_by' => 0,
                'is_published' => 1,
                'published_at' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Child items for the feed.
        foreach (range(1, 25) as $index) {
            $title = $faker->text(20);
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'parent_id' => 2,
                'title' => $title,
                'title_slug' => Str::slug($title),
                'subtitle' => $faker->text(20),
                'introduction' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(2, false))),
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => 0,
                'is_feed' => 0,
                'is_feed_item' => 1,
                'subs_paginated_by' => 0,
                'is_published' => 1,
                'published_at' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

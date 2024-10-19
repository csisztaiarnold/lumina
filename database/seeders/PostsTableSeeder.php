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

        // Create 5 items with parent_id = 0, the first one is set as home.
        foreach (range(1, 5) as $index) {
            $title = $faker->text(20);
            DB::table('posts')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'parent_id' => 0,
                'title' => $title,
                'title_slug' => Str::slug($title),
                'subtitle' => $faker->text(40),
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => $is_home_set ? 0 : ($is_home_set = 1),
                'is_published' => $is_home_set ? 1 : $faker->boolean,
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
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => 0,
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
                'content' => implode('', array_map(fn($p) => "<p>{$p}</p>", $faker->paragraphs(6, false))),
                'is_home' => 0,
                'is_published' => 1,
                'published_at' => $faker->dateTime,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

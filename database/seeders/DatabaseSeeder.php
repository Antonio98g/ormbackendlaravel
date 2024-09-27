<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Profile; 
use App\Models\Location;
use App\Models\Image;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Video;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory(3)->create();

        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        User::factory(5)->create()->each(function ($user) {
            $profile = $user->profile()->save(Profile::factory()->make());

            $profile->location()->save(Location::factory()->make());

            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(Image::factory()->make(['url' => 'https://lorempixel.com/90/90']));
        });

        Category::factory(4)->create();
        Tag::factory(12)->create();

        Post::factory(40)->create()->each(function($post) {
            $post->image()->save(Image::factory()->make());

            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 12);

            for ($i = 1; $i <= $number_comments; $i++) {
                $post->comments()->save(Comment::factory()->make());
            }
        });

        Video::factory(40)->create()->each(function($video) {
            $video->image()->save(Image::factory()->make());

            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 12);

            for ($i = 1; $i <= $number_comments; $i++) {
                $video->comments()->save(Comment::factory()->make());
            }
        });

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    public function array($max)
    {
        $values = [];

        for($i = 1; $i < $max; $i++){
            $values[] = $i;
        }

        return $values;
    }
}
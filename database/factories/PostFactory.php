<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = str_replace(' ', '-', $title); // replace space with -
        $description = $this->faker->realText(2000);
    

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'excerpt' => Str::words($description,50,"..."),
            'user_id' => rand(1,11),
            // 'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => rand(1,4),
            // 'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}

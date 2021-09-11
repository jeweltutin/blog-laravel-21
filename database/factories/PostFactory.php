<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        //$user = User::count() >= 20 ? User::inRandomOrder()->first()->id: User::factory();
        $category = Category::count() >= 7 ? Category::inRandomOrder()->first()->id: Category::factory();
        return [
            'title' => $this->faker->sentence(),
            //'slug' => Str::slug($this->faker->sentence()),
            'slug' => $slug,
            'image' => $this->faker->imageUrl(600, 400),
            'description' => $this->faker->text(400),
            'category_id' => $category,
            'user_id' => 1

        ];
    }
}

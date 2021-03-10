<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'         => $this->faker->words(2, true),
            'img'          => $this->faker->image('public/images', 200,350, null, false),
            'description'  => $this->faker->paragraphs(2, true),
            'slug'         => $this->faker->slug,            
            'recommended'  => $this->faker->numberBetween(0, 1),
            'category_id'  => Category::factory(),
        ];
    }
}

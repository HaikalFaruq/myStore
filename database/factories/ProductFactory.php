<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Yang tidak otomatis terisi di localhost
            'product_title' => $this->faker->sentence(),
            'product_slug' => $this->faker->slug(),
            'product_image' => $this->faker->sentence(),
            // 'product_price' => $this->faker->randomNumber(),
        ];
    }
}

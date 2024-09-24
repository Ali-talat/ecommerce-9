<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name ;
        $slug = Str::slug($name,"-");
        return [
            'name'=>$name,
            'description'=>$this->faker->text(),
            'short_description'=>$this->faker->text(),
            'brand_id'=>\null,
            'slug'=>$slug,
            'price'=>$this->faker->numberBetween(50,500),
            'manage_stock'=>$this->faker->boolean(),
            'in_stock'=>$this->faker->boolean(),
            'active'=>$this->faker->boolean(),
        ];
    }
}

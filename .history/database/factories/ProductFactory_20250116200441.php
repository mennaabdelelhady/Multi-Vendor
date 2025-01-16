<?php

namespace Database\Factories;

//use App\Models\Product;
use App\Models\Category; // Import Category model
use App\Models\Store; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $name = fake()->productName;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(1),
            'image' =>fake()->imageUrl(600,600),
            'price' => faker()->randomFloat(1,1,499),
            'compare_price' =>faker()->randomFloat(1,500,999),
            'category_id'=>Category::inRandomOrder()->first()->id,
            'featured'=>rand(0,1),
            'store_id'=>Store::inRandomOrder()->first()->id,

        ];
    
    }
}

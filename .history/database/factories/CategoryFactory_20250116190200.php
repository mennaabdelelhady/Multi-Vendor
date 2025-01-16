<?php

namespace Database\Factories;

//use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;
//use App\Fakers\CategoryProvider;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$name = $this->faker->unique()->department;
        //$name =$this->faker->department;
        return [
            'name' =>fake()->department,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(1),
            'image' => $this->faker->imageUrl(),
        ];
    }
}

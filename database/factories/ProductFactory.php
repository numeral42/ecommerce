<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = Subcategory::all()->random();
        $category = $subcategory->category;
        //$brand=Brand::where('category_id',$category->id)->random();
        $brand = $category->brands->random();

        if ($subcategory->color) {
            $quantity = null;
        } else {
            $quantity = rand(1, 20);
        }

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            'subcategory_id' => $subcategory,
            'brand_id' => $brand->id,
            'quantity' => $quantity,
            'status' => $this->faker->randomElement([1, 2]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'image'=>'images/subcategories/'.$this->faker->image('public/storage/images/subcategories',640,480,null,false)
        ];
    }
}

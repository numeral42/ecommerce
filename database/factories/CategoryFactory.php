<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'image'=>'images/categories/'.$this->faker->image('public/storage/images/categories',640,480,null,false)
        ];
    }
}

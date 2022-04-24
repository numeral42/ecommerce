<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{

    public function definition()
    {
        return [
            'url'=>'images/products/'.$this->faker->image('public/storage/images/products',640,480,null,false)
        ];
    }
}

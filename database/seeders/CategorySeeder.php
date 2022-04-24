<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $categories = [
            [
                'name' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'),
                'icon' => '<i class="fa-solid fa-laptop-mobile"></i>',
            ],

            [
                'name' => 'TV, audio y vidéo',
                'slug' => Str::slug('TV, audio y vidéo'),
                'icon' => '<i class="fa-solid fa-tv"></i>',
            ],
            [
                'name' => 'Consolas y videojuegos',
                'slug' => Str::slug('Consolas y videojuegos'),
                'icon' => '<i class="fa-solid fa-gamepad-modern"></i>',
            ],
            [
                'name' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icon' => '<i class="fa-solid fa-computer"></i>',
            ],
            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fa-solid fa-shirt"></i>',
            ],
        ];
            foreach ($categories as $category) {
                $category=Category::factory(1)->create($category)->first();
                $brands=Brand::factory(4)->create();

                foreach ($brands as $brand) {
                    $brand->categories()->attach($category->id);
                }
            }
    }
}

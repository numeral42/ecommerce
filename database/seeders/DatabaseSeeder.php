<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Storage::deleteDirectory('public/images/categories');
        Storage::deleteDirectory('public/images/subcategories');
        Storage::deleteDirectory('public/images/products');

        Storage::makeDirectory('public/images/categories');
        Storage::makeDirectory('public/images/subcategories');
        Storage::makeDirectory('public/images/products');

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSizeSeeder::class);
        $this->call(DepartmentSeeder::class);
    }
}

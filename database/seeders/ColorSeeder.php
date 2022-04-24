<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{

    public function run()
    {
        $colors=[
            'white',
            'blue',
            'red',
            'black',
        ];

        foreach ($colors as $color) {
            Color::create([
                'name'=>$color,
            ]);
        }
    }
}

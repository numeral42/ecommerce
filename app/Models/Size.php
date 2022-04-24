<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable=['name','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);//uno a muchos inversa
    }

    public function colors(){
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id');//muchos a muchos
    }
}

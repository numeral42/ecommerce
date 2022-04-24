<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function categories(){
        return $this->belongsToMany(Category::class);//muchos a muchos
    }

    public function products(){
        return $this->hasMany(Product::class);//uno a muchos
    }
}

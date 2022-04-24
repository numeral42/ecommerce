<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'update_at'];

    //Accesores

    public function getStockAttribute()
    {
        if ($this->subcategory->size) {
            return ColorSize::whereHas('size.product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } elseif ($this->subcategory->color) {
            return ColorProduct::whereHas('product', function (Builder $query) {
                $query->where('id', $this->id);
            })->sum('quantity');
        } else {
            return $this->quantity;
        }
    }

    //Accesores

    public function brand()
    {
        return $this->belongsTo(Brand::class); //uno a muchos inversa
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class); //uno a muchos inversa
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity', 'id'); //muchos a muchos inversa
    }
    public function sizes()
    {
        return $this->hasMany(Size::class); //uno a muchos
    }
    //Relación uno a muchos polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    //Url amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}

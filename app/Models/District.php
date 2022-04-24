<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable=['name','city_id'];

    //Relación 1:n
    public function orders()
    {
        return $this->hasMany(orders::class);
    }
}

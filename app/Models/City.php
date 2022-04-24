<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable=['name','department_id','cost'];

    //Relación 1:n
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    //Relación 
    public function orders()
    {
        return $this->hasMany(orders::class);
    }
}

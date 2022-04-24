<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
        //Relación 
        public function orders()
        {
            return $this->hasMany(orders::class);
        }
}

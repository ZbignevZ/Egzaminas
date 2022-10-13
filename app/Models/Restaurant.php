<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function meals()
    {
        return $this->hasMany(Meal::class, 'restaurant_id', 'id');
    }
}

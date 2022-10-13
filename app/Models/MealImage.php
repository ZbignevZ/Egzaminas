<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealImage extends Model
{
    use HasFactory;
    protected $fillable = ['meal_id', 'url'];
}

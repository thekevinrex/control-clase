<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'departament_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'plans_categories')
            ->withPivot('total')
            ->withTimestamps();
    }

    public function profesors()
    {
        return $this->belongsToMany(User::class, 'plans_profesors')
            ->withPivot('semana')
            ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'departament_id'];

    public function controls()
    {
        return $this->hasMany(PlanControl::class);
    }

    public function observaciones()
    {
        return $this->hasMany(Observacion::class);
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}

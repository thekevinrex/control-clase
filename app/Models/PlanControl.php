<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanControl extends Model
{
    use HasFactory;

    protected $fillable = ['controlador', 'controlado', 'semana'];

    public function profesor_controlador()
    {
        return $this->belongsTo(User::class, 'controlador', 'id');
    }

    public function profesor_controlado()
    {
        return $this->belongsTo(User::class, 'controlado', 'id');
    }
}

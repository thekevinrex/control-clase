<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $fillable = ['name', 'fecha_inicio', 'fecha_fin', 'semanas'];

    public function planes()
    {
        return $this->hasMany(Plan::class);
    }

    public function informes()
    {
        return $this->hasMany(Informe::class);
    }
}

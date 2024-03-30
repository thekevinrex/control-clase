<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function controlador()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function controlado()
    {
        return $this->belongsTo(User::class, 'to_user_id', 'id');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignature::class, 'asignature_id', 'id');
    }

    public function departamento()
    {
        return $this->belongsTo(Departament::class, 'departament_id', 'id');
    }
}

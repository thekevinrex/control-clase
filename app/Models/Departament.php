<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function asignature()
    {
        return $this->belongsToMany(Asignature::class, 'departaments_asignatures');
    }
}

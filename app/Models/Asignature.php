<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignature extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function departaments()
    {
        return $this->belongsToMany(Departament::class, 'departaments_asignatures');
    }
}

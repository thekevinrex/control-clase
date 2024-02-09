<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'observacion', 'plan_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

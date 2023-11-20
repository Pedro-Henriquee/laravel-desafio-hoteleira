<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    public function cliente() {
        return $this->belongsTo("App\Models\User");
    }

    public function quarto() {
        return $this->belongsTo("App\Models\Quarto");
    }
}

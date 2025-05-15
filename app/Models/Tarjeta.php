<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tarjeta extends Model
{
    use HasFactory;

    public $timestamps = false; // Desactivar timestamps automáticos

    // Definir la tabla asociada al modelo
    protected $table = 'tarjetas';
    protected $fillable = ['nombre', 'img'];
}

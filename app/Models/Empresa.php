<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $primaryKey = 'nit';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nit', 'nombre', 'direccion', 'telefono', 'estado'
    ];
}

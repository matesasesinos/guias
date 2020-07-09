<?php 

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Guias extends Model {
    protected $table = 'guias';
    protected $softDelete = true;
    protected $fillable = [
        'nombre',
        'dni',
        'email',
        'transporte',
        'fecha',
        'observaciones',
        'guia',
        'operacion',
        'cp'
    ];
}
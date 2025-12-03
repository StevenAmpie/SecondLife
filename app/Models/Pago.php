<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    protected $fillable = ['id_usuario', 'id_publicacion', 'monto', 'fecha'];
    public $incrementing = false;
    public $timestamps = false;
}

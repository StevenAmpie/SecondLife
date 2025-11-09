<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Usuario extends Model
{

    protected $table = 'usuario';
    protected $primaryKey = 'id'; //No necesario si la columna se llama id, pero lo deje de prueba
    protected $fillable = ["nombre", "apellido", "correo", "contrasena"];
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publicacion extends Model
{
    protected $table = 'publicacion';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_usuario', 'titulo', 'descripcion',
        'precio', 'portada', 'fecha', 'estado',
        'visibilidad', 'vistas'];

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

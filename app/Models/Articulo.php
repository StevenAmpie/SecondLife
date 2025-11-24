<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Articulo extends Model
{

    protected $table = 'articulo';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'id_publicacion', 'nombre', 'tipo',
        'talla', 'marca', 'color',
        'observacion', 'img1', 'img2'];
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

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $fillable = ["nombre", "apellido", "email", "password"];
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

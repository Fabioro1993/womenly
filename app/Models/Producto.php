<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'productos';

    protected $dates = ['deleted_at'];

    protected $fillable=['nombre', 'tipo', 'descripcion', 'cantidad'];

    protected $primaryKey = 'id_productos';
}

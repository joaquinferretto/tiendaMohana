<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoTalla extends Model
{
    protected $table = 'producto_tallas';

    protected $fillable = [
        'id_producto',
        'talla',
        'stock',
    ];

    public $timestamps = false;
}

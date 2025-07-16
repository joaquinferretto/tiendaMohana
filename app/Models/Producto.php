<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'talla',
        'color',
        'imagen',
        'estado',
        'categoria',
    ];

    protected $dates = ['deleted_at'];

    public function tallas()
    {
        return $this->hasMany(ProductoTalla::class, 'id_producto', 'id_producto');
    }

}

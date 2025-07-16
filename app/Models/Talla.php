<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Talla extends Model
{
    use HasFactory;

    protected $table = 'tallas';
    protected $primaryKey = 'id_talla';

    protected $fillable = [
        'id_producto',
        'talla',
        'stock',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}

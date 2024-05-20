<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    use HasFactory;

    protected $table = 'detalles';

    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'costo',
    ];

    // relacion con pedidos
    public function pedido(){
        return $this->belongsTo(Pedidos::class, 'pedido_id');
    }

    // relacion con productos
    public function producto(){
        return $this->belongsTo(Productos::class, 'producto_id');
    }
}

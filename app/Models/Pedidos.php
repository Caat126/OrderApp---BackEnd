<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id',
        'negocio_id',
        'total',
        'fecha',
        'comentarios',
        'coordenadas',
        'estado',
    ];

    // relacion con clientes
    public function cliente(){
        return $this->belongsTo(User::class, 'cliente_id');
    }

    // relacion con negocios
    public function negocio(){
        return $this->belongsTo(Negocios::class, 'negocio_id');
    }

    // realcion con pedidos detalles
    public function detalles(){
        return $this->hasMany(Detalles::class, 'pedido_id');
    }
}

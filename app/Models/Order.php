<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'PEDIDO';
    protected $primaryKey = 'PEDIDO_ID';
    public $timestamps = false;
    protected $fillable = [
        "USUARIO_ID",
        "STATUS_ID",
        "PEDIDO_DATA",
        "ENDERECO_ID"
    ];

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'STATUS_ID');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'PEDIDO_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'USUARIO_ID');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'ENDERECO_ID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'PEDIDO_ITEM';
    protected $primaryKey = null; 
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "PRODUTO_ID",
        "PEDIDO_ID",
        "ITEM_QTD",
        "ITEM_PRECO"
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'PRODUTO_ID');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'PEDIDO_ID');
    }
}

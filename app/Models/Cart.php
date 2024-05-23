<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $table = "CARRINHO_ITEM";
    protected $primaryKey = "USUARIO_ID";
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, "PRODUTO_ID");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "USUARIO_ID");
    }
    
    protected $fillable = [
        "USUARIO_ID",
        "PRODUTO_ID",
        "ITEM_QTD"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductImage;

class Product extends Model
{
    protected $primaryKey = 'PRODUTO_ID';
    protected $table = "PRODUTO";
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class, 'CATEGORIA_ID');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, "PRODUTO_ID");
    }

    public function qtd()
    {
        return $this->belongsTo(ProductStock::class, "PRODUTO_ID");
    }

    protected $fillable = [
        "PRODUTO_NOME",
        "PRODUTO_DESC",
        "PRODUTO_PRECO",
        "PRODUTO_DESCONTO",
        "CATEGORIA_ID",
        "PRODUTO_ATIVO"
    ];
}

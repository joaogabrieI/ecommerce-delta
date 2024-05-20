<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $primaryKey = "IMAGEM_ID";
    protected $table = "PRODUTO_IMAGEM";
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, "PRODUTO_ID");
    }
    
    protected $fillable = [
        "IMAGEM_ORDEM",
        "PRODUTO_ID",
        "IMAGEM_URL"
    ];
}

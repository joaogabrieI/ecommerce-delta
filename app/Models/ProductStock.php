<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $primaryKey = "PRODUTO_ID";
    protected $table = "PRODUTO_ESTOQUE";
    public $timestamps = false;

    public function product()
    {
        return $this->hasOne(Product::class, "PRODUTO_ID");
    }
    protected $fillable = [
        "PRODUTO_QTD"
    ];
}

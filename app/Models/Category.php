<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    protected $primaryKey = 'CATEGORIA_ID';
    protected $table = "CATEGORIA";
    public $timestamps = false;

    public function products(){
        return $this->hasMany(Product::class, "CATEGORIA_ID");
    }
    
    protected $fillable = [
        "CATEGORIA_NOME",
        "CATEGORIA_DESC",
        "CATEGORIA_ATIVO"
    ];
}

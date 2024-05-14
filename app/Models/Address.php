<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $table = "ENDERECO";
    protected $primaryKey = "ENDERECO_ID";
    public $timestamps = false;
    protected $fillable = [
        "USUARIO_ID",
        "ENDERECO_NOME",
        "ENDERECO_LOGRADOURO",
        "ENDERECO_NUMERO",
        "ENDERECO_COMPLEMENTO",
        "ENDERECO_CEP",
        "ENDERECO_CIDADE",
        "ENDERECO_ESTADO",
        "ENDERECO_APAGADO",
    ];

    public function USUARIO()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeNotDeletedForUser($query, $userId)
    {
        return $query->where('ENDERECO_APAGADO', 0)
                     ->where('USUARIO_ID', $userId);
    }
}

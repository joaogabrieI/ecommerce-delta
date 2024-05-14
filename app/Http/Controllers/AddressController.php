<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;

class AddressController extends Controller
{
    public function store(Request $request, User $user)
    {
        Address::create([
            "USUARIO_ID" => $user->USUARIO_ID,
            "ENDERECO_NOME" => $request->identificacao,
            "ENDERECO_LOGRADOURO" => $request->logradouro,
            "ENDERECO_NUMERO" => $request->numero,
            "ENDERECO_COMPLEMENTO" => $request->complemento,
            "ENDERECO_CEP" => $request->cep,
            "ENDERECO_CIDADE" => $request->cidade,
            "ENDERECO_ESTADO" => $request->estado,
            "ENDERECO_APAGADO" => 0
        ]);

        return to_route('profile.edit');
    }
}

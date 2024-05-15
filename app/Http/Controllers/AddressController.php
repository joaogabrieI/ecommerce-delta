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

    public function destroy(Address $address)
    {
        $address->ENDERECO_APAGADO = 1;
        $address->save();

        return to_route('profile.edit')->with([
            'endereco.sucesso' => "Endereço excluído com sucesso!"
        ]);
    }

    public function edit(Address $address)
    {
        return view('profile.address.edit')->with([
            'address' => $address
        ]);
    }

    public function update(Address $address, Request $request)
    {
        $address->fill([
            "ENDERECO_NOME" => $request->identificacao,
            "ENDERECO_LOGRADOURO" => $request->logradouro,
            "ENDERECO_NUMERO" => $request->numero,
            "ENDERECO_COMPLEMENTO" => $request->complemento,
            "ENDERECO_CEP" => $request->cep,
            "ENDERECO_CIDADE" => $request->cidade,
            "ENDERECO_ESTADO" => $request->estado
        ])->save();

        return to_route('profile.edit')->with([
            'endereco.sucesso' => "Endereço alterado com sucesso!"
        ]);
    }
}

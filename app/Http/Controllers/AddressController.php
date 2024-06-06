<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;

class AddressController extends Controller
{
    public function create()
    {
        return view('profile.address.create');
    }
    public function store(Request $request, User $user)
    {
        $request->validate([
            'identificacao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'numeric'],
            'complemento' => ['max:255'],
            'cep' => ['required', 'numeric', 'digits:8'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255', 'size:2']
        ]);
        
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
        $request->validate([
            'identificacao' => ['required', 'string', 'max:255'],
            'logradouro' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'numeric'],
            'complemento' => ['max:255'],
            'cep' => ['required', 'numeric', 'digits:8'],
            'cidade' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255', 'size:2']
        ]);
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

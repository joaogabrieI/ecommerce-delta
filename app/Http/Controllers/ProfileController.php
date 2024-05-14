<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('profile.edit', [
            'user' => $request->user(),
            'addresses' => $request->user()->enderecos,
            'mensagemSucesso' => $mensagemSucesso
        ]);
    }


    public function update(Request $request, User $user): RedirectResponse
    {
        $user->fill([
            'USUARIO_NOME' => $request->name,
            "USUARIO_EMAIL" => $request->email
        ])->save();

        return Redirect::route('profile.edit')->with([
            'status' => 'profile-updated',
            'mensagem.sucesso' => "Usuário alterado com sucesso!"
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

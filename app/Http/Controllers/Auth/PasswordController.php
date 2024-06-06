<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('profile.update-password-form');
    }
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        // Verifica se a senha atual do usuário está correta
        if (!Hash::check($request->current_password, $user->USUARIO_SENHA)) {
            return back()->withErrors(['current_password' => 'Senha atual incorreta.']);
        }

        // Atualiza a senha do usuário
        $user->USUARIO_SENHA = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.edit')->with(['mensagem.sucesso' => 'Senha atualizada com sucesso!']);
    }
}

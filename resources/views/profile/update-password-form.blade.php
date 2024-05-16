<section>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <!-- Campo para a senha atual -->
        <div>
            <label for="current_password">Senha Atual</label>
            <input type="password" name="current_password" id="current_password" required>
            @error('current_password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo para a nova senha -->
        <div>
            <label for="new_password">Nova Senha</label>
            <input type="password" name="new_password" id="new_password" required>
            @error('new_password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <!-- Campo para a confirmação da nova senha -->
        <div>
            <label for="password_confirmation">Confirmar Nova Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            @error('password_confirmation')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Atualizar Senha</button>
    </form>
</section>

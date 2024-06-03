<x-guest-layout>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <main class="main-pai-pw">

        <section class="section-pai-pw">
            
            <i class='bx bx-user-circle'></i>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <!-- Campo para a senha atual -->
                <div class="nome-campos-pw">
                    <label for="current_password">Senha Atual</label>
                    <input type="password" name="current_password" id="current_password" required>
                    @error('current_password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para a nova senha -->
                <div class="nome-campos-pw">
                    <label for="new_password">Nova Senha</label>
                    <input type="password" name="new_password" id="new_password" required>
                    @error('new_password')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo para a confirmação da nova senha -->
                <div class="nome-campos-pw">
                    <label for="password_confirmation">Confirmar Nova Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                    @error('password_confirmation')
                    <span>{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit">Atualizar Senha</button>
            </form>
        </section>
    </main>
    </x-guest-app>
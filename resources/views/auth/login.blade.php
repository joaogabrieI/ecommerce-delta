<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="section-login">
        <div class="container" id="container">

            <div class="form-container register-container">
                <div class="logo-login">
                    <img src="../imgs/logo.jpg" alt="" class="logo-login-img">
                </div>

                <form action="post" action="{{ route('register') }}" class="form-login">
                    @csrf
                    <h1 class="title">Registre - se</h1>
                    <input class="inputs" type="text" placeholder="Nome" name="name" :value="old('name')" required
                        autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <input class="inputs" type="email" placeholder="Email" name="email" :value="old('email')" required
                        autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <input class="inputs" type="text" placeholder="CPF" name="cpf" :value="old('cpf')" required
                        autocomplete="cpf">
                    <x-input-error :messages="$errors->get('cpf')" class="mt-2" />

                    <input class="inputs" type="password" placeholder="Senha" name="password" required
                        autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <input class="inputs" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="Confirmar senha">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <button>Cadastrar</button>
                </form>
            </div>

            <div class="form-container login-container">

                <div class="logo-login">
                    <img src="../imgs/logo.jpg" alt="" class="logo-login-img">
                </div>

                <form method="post" action="{{ route('login') }}" class="form-login">
                    @csrf
                    <h1 class="title">Login</h1>
                    <input class="inputs" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username" placeholder="Email" id="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <input class="inputs" type="password" name="password" required autocomplete="current-password"
                        placeholder="Password" id="senha">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <button>Login</button>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Esqueceu sua senha?') }}</a>
                    @endif
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="title">Seja Bem-Vindo</h1>
                        <p class="sub-titulo">se já possuí uma conta, faça o login aqui e divirta-se</p>
                        <button class="ghost" id="login">{{ __('Login') }}
                            <i class="lni lni-arrow-left login"></i>
                        </button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="title">Comece sua jornada agora</h1>
                        <p class="sub-titulo">se você ainda não tem uma conta, junte-se a nós e comece sua jornada</p>
                        <button class="ghost" id="register">{{ __('Cadastrar') }}
                            <i class="lni lni-arrow-right register"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script src="{{asset('/js/login.js')}}"></script>
</x-guest-layout>

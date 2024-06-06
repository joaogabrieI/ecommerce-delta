<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delta Games</title>
        <link rel="stylesheet" href="../style/main.css">
        <link rel="icon" type="image/x-icon" href="{{asset('imgs/favicon.ico')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
</head>

<body>

    <header class="header2">

        <section class="pai">

            <div class="sidebar">
                <div class="logo-content">
                    <div class="logo">
                        <i class='bx bx-user'></i>
                        <div class="logo-name">Minha Conta</div>
                    </div>
                    <i class='bx bx-menu' id="btn"></i>
                    <i class='bx bx-x' id="btn_s"></i>
                </div>

                <nav>
                    <ul class="nav-list">
                        <li><a href="/">
                                <i class='bx bx-home icones-sid'></i>
                                <span class="link-name">Home</span>
                            </a>
                            <span class="tooltip">Home</span>
                        </li>
                        <li><a href="{{route('products')}}">
                                <i class='bx bxs-package'></i>
                                <span class="link-name">Produtos</span>
                            </a>
                            <span class="tooltip">Produtos</span>
                        </li>
                        <li><a href="{{route('profile.edit')}}">
                                <i class='bx bx-user'></i>
                                <span class="link-name">Minha conta</span>
                            </a>
                            <span class="tooltip">Produtos</span>
                        </li>
                        <li><a href="{{route('cart')}}">
                                <i class='bx bxs-cart'></i>
                                <span class="link-name">Carrinho</span>
                            </a>
                            <span class="tooltip">Carrinho</span>
                        </li>
                        @auth
                        <li><a href="{{route('orders.index')}}">
                                <i class='bx bxs-shopping-bags'></i>
                                <span class="link-name">Pedidos</span>
                            </a>
                            <span class="tooltip">Pedidos</span>
                        </li>
                        <li><a href="{{route('password.edit')}}">
                                <i class='bx bxs-cart'></i>
                                <span class="link-name">Alterar senha</span>
                            </a>
                            <span class="tooltip">Alterar senha</span>
                        </li>
                        @endauth
                    </ul>
                </nav>
            </div>

            <div class="input-container">
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Pesquisar" class="input-pesquisa">
            </div>

        </section>

        <div class="logo-container">
            <img src="../imgs/logo.jpg" alt="" class="logo-principal2">
        </div>

        @guest
        <div class="cart entrar">
            <a href="{{route('login')}}"> <input type="button" name="Entrar" value="Entrar" class="btn-log"></a>
        </div>
        @endguest
        @auth
        <div class="cart entrar">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <input type="submit" name="Entrar" value="Sair" class="btn-log">
            </form>
            <a href="{{route('cart')}}"><i class='bx bx-cart'></i></a>
        </div>
        @endauth

    </header>

    <section class="section-minha-c">

        <main class="d-flex justify-content-sm-around mb-5" id="main">
            <section class="user-data d-flex align-items-center justify-content-center">
                <div>
                    <div class="user-title d-flex align-items-center">
                        <span class="material-symbols-outlined"> person </span>
                        <!-- <i class='bx bx-user'></i> -->
                        <h2>Meus Dados</h2>
                    </div>

                    @isset($mensagemSucesso)
                    <div class="alert alert-success alert-link">
                        {{$mensagemSucesso}}
                    </div>
                    @endisset
                    <form method="post" action="{{ route('profile.update', $user->USUARIO_ID) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nome" class="user-label">Nome Completo</label>
                            <input type="text" name="name" value="{{$user->USUARIO_NOME}}" class="form-control" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label for="email" class="user-label">Email</label>
                            <input type="email" name="email" value="{{$user->USUARIO_EMAIL}}" class="form-control" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="user-label">CPF</label>
                            <input type="text" name="cpf" id="CPF" value="{{$user->USUARIO_CPF}}" disabled class="form-control" />
                        </div>

                        <button class="user-btn-edit-address">Alterar os dados</button>
                    </form>

                    <div class="user-data-remove text-center">
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <button class="user-data-remove-link">Excluir conta</button>
                        </form>
                    </div>

                </div>
            </section>

            <section class="user-address d-flex align-items-center justify-content-center">
                <div class="pai-endereco">
                    <div class="user-address-title d-flex align-items-center">
                        <span class="material-symbols-outlined"> location_on </span>
                        <!-- <i class='bx bx-map'></i> -->
                        <h2>Endereços</h2>
                    </div>
                    @isset($enderecoSucesso)
                    <div class="alert alert-success alert-link">
                        {{$enderecoSucesso}}
                    </div>
                    @endisset
                    <div class="valores-endereco">
                        @foreach ($addresses as $address)
                        <div class="user-address-card">
                            <h3 class="user-address-card-title">{{$address->ENDERECO_NOME}}</h3>

                            <div class="testesste">
                                <p class="user-address-card-text">{{$address->ENDERECO_LOGRADOURO}}, {{$address->ENDERECO_NUMERO}} - @isset($address->ENDERECO_COMPLEMENTO) {{$address->ENDERECO_COMPLEMENTO}} - @endisset
                                    {{$address->ENDERECO_CIDADE}} / {{$address->ENDERECO_ESTADO}} - CEP: {{$address->ENDERECO_CEP}}
                                </p>

                                <div class="d-flex">
                                    <a href="{{route('address.edit', $address->ENDERECO_ID)}}" class="open-modal user-address-edit-btn">Editar</a>
                                    <form action="{{route('address.destroy', $address->ENDERECO_ID)}}" method="post" class="">
                                        @csrf
                                        @method('delete')
                                        <button class="user-address-delete-btn" id="btn-ex">Excluir</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        @endforeach

                        <a href="{{route('address.create')}}">
                            <button class="user-address-card-btn open-modal-address">
                                Adicionar Endereço
                            </button>
                        </a>

                        <!-- <dialog class="dialog-add-address p-3">
                    <div class="dialog">
                        <div class="modal-endereco">

                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined"> location_on </span>
                                <h3>Adicionar novo endereço</h3>
                            </div>
                            <form action="{{route('address.store', $user->USUARIO_ID)}}" method="post" class="modal-form d-flex-column">
                                @csrf
                                <div class="form-group">
                                    <label for="identificacao" class="dialog-form-label">Identificação</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="logradouro" class="dialog-form-label">Logradouro</label>
                                    <input type="text" name="logradouro" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="numero" class="dialog-form-label">Número</label>
                                    <input type="text" name="numero" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="complemento" class="dialog-form-label">Complemento</label>
                                    <input type="text" name="complemento" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cep" class="dialog-form-label">CEP</label>
                                    <input type="text" name="cep" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cidade" class="dialog-form-label">Cidade</label>
                                    <input type="text" name="cidade" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="estado" class="dialog-form-label">Estado</label>
                                    <input type="text" name="estado" id="" class="form-control">
                                </div>

                                <div class="dialog-container-buttons">
                                    <button type="submit" class="mt-2 dialog-button-edit">Salvar</button>
                                </div>

                            </form>

                            <div class="d-flex align-items-center justify-content-center">
                                <button class="dialog-address-button-close mt-2">Fechar</button>
                            </div>

                        </div>
                    </div>
                </dialog> -->
                    </div>
                </div>
            </section>
        </main>

    </section>

    <footer>
        <div class="company-info">
            <div class="footer-logo">
                <img src="../imgs/logo.jpg" alt="" class="logo">
            </div>

            <p class="text">
                Proporcionar aos gamers uma experiência de compra excepcional,
                oferecendo uma ampla variedade de jogos, com foco na qualidade,
                diversidade e acessibilidade. Estamos comprometidos em satisfazer as
                necessidades e desejos dos nossos clientes, fornecendo um serviço
                personalizado, entregas rápidas e garantindo a excelência em cada
                interação.
            </p>

            <div class="contact">
                <h3 class="contact-title">Contato</h3>
                <div class="icon-contact">
                    <span class="material-symbols-outlined"> call </span>
                    <p>Telefone: 11-91234-5678</p>
                </div>
                <div class="icon-contact">
                    <span class="material-symbols-outlined"> mail </span>
                    <p>Email: delta@email.com</p>
                </div>
                <div class="icon-contact">
                    <span class="material-symbols-outlined"> phone_iphone </span>
                    <p>Whatsapp: 11 99999-9999</p>
                </div>
            </div>


            <div class="socials">

                <a href="#" class="icons-redes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-facebook teste ms-4" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </a>

                <a href="#" class="icons-redes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-instagram teste ms-4" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>

                <a href="#" class="icons-redes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-twitter-x teste ms-4" viewBox="0 0 16 16">
                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                    </svg>
                </a>
            </div>
    </footer>

    <div class="company-data d-flex justify-content-center align-items-center">
        <p class="text-center company-text">
            DELTA - CNPJ: 12.345.678/0001-10 © Todos os direitos reservados. 2024
        </p>
    </div>

    <script src="../js/index.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta Games</title>
    <link rel="stylesheet" href="{{asset('../style/main.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('imgs/favicon.ico')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <header class="header2">

        <section class="pai">

            <div class="sidebar">
                <div class="logo-content">
                    <div class="logo">
                        <i class='bx bxs-home'></i>
                        <div class="logo-name">Home</div>
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
            <i class='bx bx-cart'></i>
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

    <main>
        <section class="checkout">
            <div class="container-checkout">
                <h1 class="checkout-title">Detalhes da Compra</h1>
                <div class="order-summary">
                    <h2>Resumo do Pedido</h2>
                    <table class="table">
                        <thead class="text-center">
                            <tr class="bg-dark">
                                <th scope="col">Produto</th>
                                <th scope="col">Preço Unitário</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($products as $cartItem)
                            @php
                            $product = $cartItem->products;
                            $discountedPrice = $product->PRODUTO_PRECO - ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO / 100);
                            @endphp
                            <tr>
                                <td class="p-3">
                                    <img src="{{ $product->images->first()->IMAGEM_URL }}" alt="" class="img-checkout">
                                    <p>{{ $product->PRODUTO_NOME }}</p>
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($discountedPrice, 2, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    {{ $cartItem->ITEM_QTD }}
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($discountedPrice * $cartItem->ITEM_QTD, 2, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-dark">
                                <td colspan="3"></td>
                                <td class="text-end p-2">Subtotal: R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-end mt-2 p-2">
                                    <h2 class="mt-3">Total: R$ {{ number_format($subtotal, 2, ',', '.') }} <span>á vista</span></h2>
                                    <p>ou em até 3x de R$ {{ number_format($subtotal / 3, 2, ',', '.') }} sem juros</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="address-selection">
                    <h2>Escolha o Endereço de Entrega</h2>
                    <form action="{{route('order.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="endereco_id">Endereço:</label>
                            <select name="endereco_id" id="endereco_id" class="form-control">
                                @foreach($adresses as $address)
                                <option value="{{ $address->ENDERECO_ID }}">{{ $address->ENDERECO_NOME }} - {{ $address->ENDERECO_LOGRADOURO }}, {{ $address->ENDERECO_NUMERO }} - {{ $address->ENDERECO_CIDADE }} / {{ $address->ENDERECO_ESTADO }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Finalizar Compra</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../js/index.js"></script>

</body>

</html>
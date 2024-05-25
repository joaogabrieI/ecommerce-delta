<x-guest-layout>
    <section class="section2 produtos_produtos">


        <div class="tabela-navegacao">
            <div class="console">
                <h2>Categorias</h2>
            </div>

            <div class="console-op">
                @foreach($categories as $category)
                <a href="{{route('products.category', $category->CATEGORIA_ID)}}">{{$category->CATEGORIA_NOME}}</a>
                @endforeach
            </div>

        </div>

        <div class="cards-pai cardsPai_produtos" id="cardsPai">
            @foreach($products as $product)
            @php
            // Calculando o preço com desconto
            $desconto = ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO) / 100;
            $precoComDesconto = $product->PRODUTO_PRECO - $desconto;
            @endphp
            @if($product->images->isNotEmpty())
            @foreach($product->images as $image)
            <div class="card" id="modeloCard">
                <div class="card-image"><img class="imgs-cards" src="{{$image->IMAGEM_URL}}" height="150px" width="100px" alt=""></div>
                <div class="titulo-produto">
                    <h2>{{$product->PRODUTO_NOME}}</h2>
                </div>
                <div class="card-prices">
                    <div class="card-price">R$ {{number_format($product->PRODUTO_PRECO, 2, ',', '.')}}</div>
                    <p>ou</p>
                    <div class="card-price">R$ {{ number_format($precoComDesconto, 2, ',', '.') }} <span class="nc">Com desconto</span></div>
                </div>
                <div class="card-buttons">
                    <a href="{{route('product.show', $product->PRODUTO_ID)}}">
                        <button class="card-button" id="comp">Comprar</button>
                    </a>
                    <form action="{{route('cart.add', $product->PRODUTO_ID)}}" method="post">
                        @csrf
                        <button class="card-button" id="add">Adicionar</button>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <div class="card" id="modeloCard">
                <div class="card-image"><img class="imgs-cards" src="{{asset('imgs/default.jpg')}}" height="150px" width="100px" alt=""></div>
                <div class="titulo-produto">
                    <h2>{{$product->PRODUTO_NOME}}</h2>
                </div>
                <div class="card-prices">
                    <div class="card-price">R$ {{$product->PRODUTO_PRECO}}</div>
                    <p>ou</p>
                    <div class="card-price">R$ 129,99 <span class="nc">Com desconto</span></div>
                </div>
                <div class="card-buttons">
                    <a href="{{route('product.show', $product->PRODUTO_ID)}}">
                        <button class="card-button" id="comp">Comprar</button>
                    </a>
                    <form action="{{route('cart.add', $product->PRODUTO_ID)}}" method="post">
                        @csrf
                        <button class="card-button" id="add">Adicionar</button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </section>
</x-guest-layout>
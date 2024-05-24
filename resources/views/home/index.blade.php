<x-guest-layout>
<div class="nome-loja">
        <h1>Delta Games</h1>
    </div>

    <section class="section1">

        <div class="links-icons" id="links-icons">
            <div class="div0">
                <img class="imgs-icons" src="../imgs/frete.png" alt="">
                <p>Entrega para todo Brasil</p>
            </div>
            <div class="div0">
                <img class="imgs-icons" src="../imgs/desconto.png" alt="">
                <p>Cupons</p>
            </div>
            <div class="div0">
                <img class="imgs-icons" src="../imgs/game.png" alt="">
                <p>Jogos</p>
            </div>
        </div>

    </section>

    <section class="section2">
    <div class="cards-pai" id="cardsPai">
        @foreach($products as $product)
            @if($product->images->isNotEmpty())
                @foreach($product->images as $image)
                    <div class="card" id="modeloCard">
                        <div class="card-image">
                            <img class="imgs-cards" src="{{$image->IMAGEM_URL}}" alt="" height="150px" width="100px">
                        </div>
                        <div class="titulo-produto">
                            <h2>{{$product->PRODUTO_NOME}}</h2>
                        </div>
                        <div class="card-prices">
                            <div class="card-price">{{$product->PRODUTO_PRECO}}</div>
                            <p>ou</p>
                            <div class="card-price">R$ 129,99 <span class="nc">Com Desconto</span></div>
                        </div>
                        <div class="card-buttons">
                            <a href="{{route('product.show', $product->PRODUTO_ID)}}">
                                <button class="card-button" id="comp">Ver Detalhes</button>
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
                    <div class="card-image">
                        <img class="imgs-cards" src="{{ asset('imgs/default.jpg') }}" alt="" height="150px" width="100px">
                    </div>
                    <div class="titulo-produto">
                        <h2>{{$product->PRODUTO_NOME}}</h2>
                    </div>
                    <div class="card-prices">
                        <div class="card-price">{{$product->PRODUTO_PRECO}}</div>
                        <p>ou</p>
                        <div class="card-price">R$ 129,99 <span class="nc">Com Desconto</span></div>
                    </div>
                    <div class="card-buttons">
                        <a href="{{route('product.show', $product->PRODUTO_ID)}}">
                            <button class="card-button" id="comp">Ver Detalhes</button>
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

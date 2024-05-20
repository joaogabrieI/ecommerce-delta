<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>
    <div>
        @foreach ($images as $image)
        <img src="{{$image->IMAGEM_URL}}" alt="">
        <p>{{$image->IMAGEM_ORDEM}}</p>
        @endforeach
    </div>

    <div>
        <div>
            <p>Nome: {{$product->PRODUTO_NOME}}</p>
            <p>Categoria: {{$product->category->CATEGORIA_NOME}}</p>
        </div>
        <div>
            <p>Descrição: {{$product->PRODUTO_DESC}}</p>
        </div>
    </div>
    <div>
        <p>Preço: {{$product->PRODUTO_PRECO}}</p>
        <p>Desconto: {{$product->PRODUTO_DESCONTO}}</p>
        <p>Quantidade: {{$qtd->PRODUTO_QTD}}</p>
    </div>

    <div>
        <button>Comprar</button>
    </div>
</body>
</html>
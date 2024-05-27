<section class="cart">
            <div class="">
                <h1 class="cart-title">
                    Carrinho
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </h1>
                <div class="products-info">
                    <table>
                        <thead class="text-center cart-table-head">
                            <tr class="bg-dark">
                                <th scope="col">Produto</th>
                                <th scope="col">Preço Unitário</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Excluir</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                        @foreach($products as $cartItem)
                            <tr>
                                <td class="p-3">
                                    <img src="{{ $cartItem->products->images->first()->IMAGEM_URL }}" alt="" width="50px" height="50px">
                                    {{ $cartItem->products->PRODUTO_NOME }}
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($cartItem->products->PRODUTO_PRECO, 2, ',', '.') }}
                                </td>
                                <td class="text-center cart-qtd">
                                    <input type="number" name="qtd" value="{{ $cartItem->ITEM_QTD }}" readonly>
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($cartItem->products->PRODUTO_PRECO * $cartItem->ITEM_QTD, 2, ',', '.') }}
                                </td>
                                <td class="text-center cart-trash">
                                    <form action="{{ route('cart.remove', $cartItem->PRODUTO_ID) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-dark">
                                <td colspan="3"></td>
                                <td colspan="3" class="text-end p-2">Subtotal: R$ {{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end cart-total mt-2 p-2">
                                    <h2 class="mt-3">Total: R$ {{ number_format($total, 2, ',', '.') }}</h2>
                                    <p>via Pix por R$ {{ number_format($total * 0.9, 2, ',', '.') }} com 10% de desconto</p>
                                    <p>ou em até 3x de R$ {{ number_format($total / 3, 2, ',', '.') }} sem juros</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3 text-end">
                        <button class="btn btn-secondary">Continuar Comprando</button>
                        <button class="btn btn-success">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </section>

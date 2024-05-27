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
                        @php
                                $product = $cartItem->products;
                                $discountedPrice = $product->PRODUTO_PRECO - ($product->PRODUTO_PRECO * $product->PRODUTO_DESCONTO / 100);
                            @endphp
                            <tr>
                                <td class="p-3">
                                    <img src="{{ $cartItem->products->images->first()->IMAGEM_URL }}" alt="" width="50px" height="50px">
                                    {{ $cartItem->products->PRODUTO_NOME }}
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($discountedPrice, 2, ',', '.') }}
                                </td>
                                <td class="text-center cart-qtd">
                                    <input type="number" name="quantity" value="{{ $cartItem->ITEM_QTD }}" min="1" data-product-id="{{ $cartItem->PRODUTO_ID }}">
                                </td>
                                <td class="text-center">
                                    R$ {{ number_format($discountedPrice * $cartItem->ITEM_QTD, 2, ',', '.') }}
                                </td>
                                <td class="text-center cart-trash">
                                    <form action="{{ route('cart.remove', $cartItem->PRODUTO_ID) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
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
                                <td colspan="3" class="text-end p-2">Subtotal: R$ {{ number_format($subtotal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end cart-total mt-2 p-2">
                                    <h2 class="mt-3">Total: R$ {{ number_format($subtotal, 2, ',', '.') }}</h2>
                                    <p>ou em até 3x de R$ {{ number_format($subtotal / 3, 2, ',', '.') }} sem juros</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3 text-end">
                        <button class="btn btn-success">Continuar Comprando</button>
                        <a href="{{route('checkout')}}" class="btn btn-secondary">Finalizar Compra</a>
                    </div>
                </div>
            </div>
        </section>
        <script>
        document.querySelectorAll('input[name="quantity"]').forEach(input => {
            input.addEventListener('change', function() {
                let productId = this.getAttribute('data-product-id');
                let quantity = this.value;

                fetch(`{{ url('/cart/update') }}/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Erro ao atualizar a quantidade do produto.');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
            });
        });
    </script>

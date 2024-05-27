<main>
        <section class="checkout">
            <div class="container">
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
                                    <img src="{{ $product->images->first()->IMAGEM_URL }}" alt="" width="50px" height="50px">
                                    {{ $product->PRODUTO_NOME }}
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
                    <form action="#" method="post">
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

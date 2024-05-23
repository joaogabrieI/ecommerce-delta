<x-app-layout>
    <main>
        <section class="cart d-flex">
            <div class="container">
                <h1 class="mt-3 cart-title">
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
                            <tr>
                                <td class="p-3">
                                    <img src="img/twitter-3 1.png" alt="">
                                    Descrição do produto
                                </td>
                                <td class="text-center">
                                    R$ 500,00
                                </td>
                                <td class="text-center cart-qtd">
                                    <button>-</button>
                                    1
                                    <button>+</button>
                                </td>
                                <td class="text-center">
                                    R$ 1000,00
                                </td>
                                <td class="text-center cart-trash">
                                    <a href="">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    <img src="img/twitter-3 1.png" alt="">
                                    Descrição do produto
                                </td>
                                <td class="text-center">
                                    R$ 500,00
                                </td>
                                <td class="text-center cart-qtd">
                                    <button>-</button>
                                    1
                                    <button>+</button>
                                </td>
                                <td class="text-center">
                                    R$ 1000,00
                                </td>
                                <td class="text-center cart-trash">
                                    <a href="">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">
                                    <img src="img/twitter-3 1.png" alt="">
                                    Descrição do produto
                                </td>
                                <td class="text-center">
                                    R$ 500,00
                                </td>
                                <td class="text-center cart-qtd">
                                    <button>-</button>
                                    1
                                    <button>+</button>
                                </td>
                                <td class="text-center">
                                    R$ 1000,00
                                </td>
                                <td class="text-center cart-trash">
                                    <a href="">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-dark">
                                <td colspan="3"></td>
                                <td colspan="3" class="text-end p-2">Subtotal: R$ 3000,00</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end cart-total mt-2 p-2">
                                    <h2 class="mt-3">Total: R$ 1.299,80</h2>
                                    <p>via Pix por R$ 1.169,82 com 10% de desconto</p>
                                    <p>ou em até 3x de R$ 433,26 sem juros</p>
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
    </main>
</x-app-layout>
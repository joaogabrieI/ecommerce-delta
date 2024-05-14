<x-app-layout>
    <main class="d-flex justify-content-sm-around mb-5">
        <section class="user-data d-flex align-items-center justify-content-center">
            <div>
                <div class="user-title d-flex align-items-center">
                    <span class="material-symbols-outlined"> person </span>
                    <h2>Meus Dados</h2>
                </div>
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="nome" class="user-label">Nome Completo</label>
                        <input type="text" name="name" value="{{$user->USUARIO_NOME}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="email" class="user-label">Email</label>
                        <input type="email" name="email" value="{{$user->USUARIO_EMAIL}}" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="user-label">CPF</label>
                        <input type="text" name="cpf" id="" value="{{$user->USUARIO_CPF}}" disabled class="form-control" />
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
            <div>
                <div class="user-address-title d-flex align-items-center">
                    <span class="material-symbols-outlined"> location_on </span>
                    <h2>Endereços</h2>
                </div>
                <div>
                    @foreach ($addresses as $address)
                    <div class="user-address-card">
                        <h3 class="user-address-card-title">{{$address->ENDERECO_NOME}}</h3>
                        <p class="user-address-card-text">{{$address->ENDERECO_LOGRADOURO}}, 
                        {{$address->ENDERECO_NUMERO}} - @isset($address->ENDERECO_COMPLEMENTO) - {{$address->ENDERECO_COMPLEMENTO}} @endisset 
                         {{$address->ENDERECO_CIDADE}} - {{$address->ENDERECO_ESTADO}} - CEP: {{$address->ENDERECO_CEP}} </p>

                        <button type="button" class="open-modal user-address-edit-btn">Editar</button>
                        <a href="#" class="user-address-delete-btn">Excluir</a>
                    </div>
                    @endforeach

                    <dialog class="p-3">
                            <div class="d-flex align-items-center">
                                <span class="material-symbols-outlined"> location_on </span>
                                <h3>Editar Endereço</h3>
                            </div>
                            <form action="" class="modal-form d-flex-column">
                                <div class="form-group">
                                    <label for="identificacao" class="dialog-form-label">Identificação</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="logradouro" class="dialog-form-label">Logradouro</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="numero" class="dialog-form-label">Número</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="bairro" class="dialog-form-label">Bairro</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="complemento" class="dialog-form-label">Complemento</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cep" class="dialog-form-label">CEP</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="cidade" class="dialog-form-label">Cidade</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="estado" class="dialog-form-label">Estado</label>
                                    <input type="text" name="identificacao" id="" class="form-control">
                                </div>

                                <div class="dialog-container-buttons">
                                    <button type="submit" class="mt-2 dialog-button-edit">Editar</button>
                                </div>

                            </form>

                            <div class="d-flex align-items-center justify-content-center">
                                <button class="dialog-button-close mt-2">Fechar</button>
                            </div>
                        </dialog>
                    <button class="user-address-card-btn open-modal-address">
                        Adicionar Endereço
                    </button>

                    <dialog class="dialog-add-address p-3">
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
                                <label for="bairro" class="dialog-form-label">Bairro</label>
                                <input type="text" name="bairro" id="" class="form-control">
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
                                <button type="submit" class="mt-2 dialog-button-edit">Editar</button>
                            </div>
                        </form>
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="dialog-address-button-close mt-2">Fechar</button>
                        </div>
                    </dialog>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
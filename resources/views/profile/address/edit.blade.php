
    <main>
        <section>
            <div class="d-flex align-items-center">
                <span class="material-symbols-outlined"> location_on </span>
                <h3>Editar Endereço</h3>
            </div>
            <form action="{{route('address.update', $address->ENDERECO_ID)}}" method="post" class="d-flex-column">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="identificacao">Identificação</label>
                    <input type="text" name="identificacao" id="" class="form-control" value="{{$address->ENDERECO_NOME}}">
                </div>

                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" name="logradouro" id="" class="form-control" value="{{$address->ENDERECO_LOGRADOURO}}">
                </div>

                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" id="" class="form-control" value="{{$address->ENDERECO_NUMERO}}">
                </div>

                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="" class="form-control" value="{{$address->ENDERECO_COMPLEMENTO}}">
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" id="" class="form-control" value="{{$address->ENDERECO_CEP}}">
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="" class="form-control" value="{{$address->ENDERECO_CIDADE}}">
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="" class="form-control" value="{{$address->ENDERECO_ESTADO}}">
                </div>

                <div class="dialog-container-buttons">
                    <button type="submit" class="mt-2 dialog-button-edit">Editar</button>
                </div>

                </form>
        </section>
    </main>

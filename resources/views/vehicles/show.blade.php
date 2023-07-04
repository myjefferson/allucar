<link href={{ asset('assets/css/show.vehicle.css') }} rel="stylesheet">
@extends('layouts.app')
@extends('components.modal')

@section('title', 'Detalhes do Veículo')
@section('content_app')
    <a href={{ route('vehicle.index') }} class="btn btn-primary mb-3">Voltar</a>
    <div class="card mb-3" style="width: 100%;">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <img src={{ url("upload/".$vehicle->image) }} alt={{ $vehicle->marca }} class="image-upload">
            </div>
            <div class="card-body col-12 col-sm-12 col-md-6 d-flex align-items-center">
                <div>
                    <p><b>Veiculo</b></p>
                    <p> Marca: {{ $vehicle->marca }} </p>
                    <p> Modelo: {{ $vehicle->modelo }} </p>
                    <h3><b> R${{ $vehicle->preco }} </b></h3>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalRemove">Remover</button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRegister">
                        Editar Veículo
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content_modal_register')
    @section('modal_title_register', 'Editar veículo')

    <form action="{{ route('vehicle.update', $vehicle->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem do veículo</label>
                <input id="imagem" type="file" name="image" class="form-control" value={{$vehicle->image}} required>
                <div class="form-text"> Envie arquivos com tamanho de até 25MB. </div>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input id="marca" type="text" name="marca" class="form-control" value={{$vehicle->marca}} required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input id="modelo" type="text" name="modelo" class="form-control" value={{$vehicle->modelo}} required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input id="preco" type="number" name="preco" class="form-control" value={{$vehicle->preco}} required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar alterações</button>
        </div>
    </form>
@endsection

@section('content_modal_remove')
    @section('modal_title_remove', 'Remover veículo')

    <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="post">
        @method('DELETE')
        @csrf
        <div class="modal-body">
            <h3>Tem certeza que deseja remover?</h3>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Confirmar e remover</button>
        </div>
    </form>
@endsection

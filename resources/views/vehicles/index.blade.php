@extends('layouts.app')
@extends('components.modal')

@section('content_app')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">Veículos</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalRegister">
            Cadastrar Veículo
        </button>
    </div>
    <div class="row">
        @foreach ($vehicles as $vehicle)
            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="card mb-3" style="width: 100%;">
                    <img width="100%" src={{ url("upload/".$vehicle->image) }} alt={{ $vehicle->marca }}>
                    <div class="card-body">
                        <h5 class="card-title">Marca: {{ $vehicle->marca }}</h5>
                        <p class="card-text mb-1">Modelo: {{ $vehicle->modelo }}</p>
                        <h4 class="card-text mt-1"><b>R${{ $vehicle->preco }}</b></h4>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalRemove">Remover</button>
                        <a href={{ route('vehicle.show', ['id' => $vehicle->id]) }} class="btn btn-primary">Mais detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('content_modal_register')
    @section('modal_title_register', 'Cadastro de veículo')

    <form action={{ route('vehicle.store') }} method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem do veículo</label>
                <input id="imagem" type="file" name="image" class="form-control" required>
                <div class="form-text">Envie arquivos com tamanho de até 25MB.</div>
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input id="marca" type="text" name="marca" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input id="modelo" type="text" name="modelo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input id="preco" type="number" name="preco" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar cadastro</button>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection

@if (!empty($vehicle))
    @section('content_modal_remove')
        @section('modal_title_remove', 'Remover veículo')

        <form action="{{ route('vehicle.delete', $vehicle->id) }}" method="post" enctype="multipart/form-data">
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
@endif

@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Editar Produto</h1>

@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/produto/{{$produto->id}}">
        @csrf
    @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $produto->nome }}">
            <label for="qtd_produto">Quantidade</label>
            <input type="number" class="form-control" name="qtd_produto" id="qtd_produto" value="{{ $produto->qtd_produto }}">
            <label for="valor">Preço</label>
            <input type="number" class="form-control" name="valor" id="valor" value="{{ $produto->valor }}">
        </div>
        <button class="btn btn-primary">Cadastrar</button>
    </form>

@endsection




@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Meus Produtos</h1>

@endsection

@section('content')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade</th>
            <th scope="col">valor unitario</th>
            <th scope="col">Editar</th>
            <th scope="col">remover</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($produtos as $produto)
            <tr>
                <th scope="row">{{ $produto->nome }}</th>
                <td>{{ $produto->qtd_produto }}</td>
                <td>{{ $produto->valor }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/produto/{{ $produto->id }}">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </td>
                <td> <form method="post" action="/produto/remover/{{ $produto->id }}"
                           onsubmit="return confirm('tem certeza que deseja exluir {{ addslashes($produto->nome) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

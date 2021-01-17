@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Relatorio de vendas</h1>

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
            <th scope="col">Data da venda</th>
            <th scope="col">Status de venda</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vendas as $venda)
            <tr>
                <th scope="row">{{ $venda->serie_id }}</th>
                <td>{{ $venda->dt_venda }}</td>
                <td>{{ $venda->finalizada }}</td>
                <td>
                        <button class="btn btn-success btn-sm">
                            Finalizar
                        </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

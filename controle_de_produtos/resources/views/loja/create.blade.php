@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Loja</h1>

@endsection

@section('content')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="aluno">
                Aluno
            </label>
            <select class="custom-select"
                    name="aluno"
                    id="aluno">
                <option>Selecione</option>
                @foreach($alunos as $aluno)
                    <option
                        value="{{ $aluno->id }}">
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
            <label for="dt_venda">Data da venda</label>
            <input
                type="date"
                class="form-control"
                name="dt_venda"
                id="dt_venda">
            <label for="produto">Produto</label>
            <select class="custom-select"
                    name="produto"
                    id="produto">
                <option>Selecione</option>
                @foreach ($produtos as $produto)
                    <option
                        value="{{ $produto->id }}">
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
            <label for="qtd_produtos">Quantidade</label>
            <input type="number" class="form-control" name="qtd_produtos" id="qtd_produtos">
        </div>
        <button class="btn btn-danger btn-sm">
            <i class="fas fa-money-bill-wave"> comprar</i>
        </button>
    </form>
  <h2>Produtos disponiveis</h2>
        <table class="table container">
            <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preço unico</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                  <tr>
                      <th scope="row" hidden>
                        <th scope="row">
                            {{ $produto->nome }}
                        </th>
                        <td>
                            {{ $produto->qtd_produto }}
                        </td>
                        <td>
                            {{ $produto->valor }}
                        </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
@endsection

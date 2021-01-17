@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

  <h1>Meus Alunos</h1>

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
            <th scope="col">Data Nascimento</th>
            <th scope="col">Turma</th>
            <th scope="col">Cidade</th>
            <th scope="col">Editar</th>
            <th scope="col">remover</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($alunos as $aluno)
        <tr>
                <th scope="row">{{ $aluno->id }}</th>
                <td>{{ $aluno->dt_nascimento }}</td>
                <td>{{ $aluno->turma }}</td>
                <td>{{ $aluno->cidade }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/series/{{ $aluno->id }}">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </td>
                <td> <form method="post" action="/series/remover/{{ $aluno->id }}"
                           onsubmit="return confirm('tem certeza que deseja exluir {{ addslashes($aluno->nome) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
        </tr>
        @endforeach;
        </tbody>
    </table>

@endsection

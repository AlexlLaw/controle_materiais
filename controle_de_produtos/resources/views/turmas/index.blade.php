@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Minhas Turmas</h1>

@endsection

@section('content')
    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <ul class="list-group">
        @foreach ($turmas as $turma)
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $turma->nome }}
                <form method="post" action="/turma/remover/{{ $turma->id }}"
                      onsubmit="return confirm('tem certeza que deseja exluir {{ addslashes($turma->nome) }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </li>
        @endforeach;
    </ul>
@endsection

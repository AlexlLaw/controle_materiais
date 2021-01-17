@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Importar Arquivo CSV</h1>

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

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <form method="post" action="{{ route('import') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
        <label>importar arquivo csv</label>
            <input type="file" id="file" name="file" accept=".csv">
        </div>

        <button class="btn btn-primary">Importar</button>
    </form>
@endsection


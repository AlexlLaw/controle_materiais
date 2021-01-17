@extends('adminlte::page')

@section('title', 'Alunos')

@section('content_header')

    <h1>Adicionar Novo Aluno</h1>

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

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="nome" >Nome</label>
            <input type="text" class="form-control" name="nome">
            <label for="dt_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" name="dt_nascimento" id="dt_nascimento">
            <label for="turma">Turmas</label>
            <select class="custom-select" name="turma" id="turma">
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
            <label for="cep">Cep</label>
            <input type="text" class="form-control" name="cep" id="cep">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="endereco">
            <label for="bairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" placeholder="Bairro" id="Bairro" />
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" id="cidade">
            <label for="uf">UF</label>
            <input type="text" class="form-control" name="uf" id="uf">
        </div>
        <button class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
@section('js')
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[name=cep]").blur(function(){
                var cep = $(this).val().replace(/[^0-9]/, '');
                if(cep){
                    var url = 'https://viacep.com.br/ws/' + cep + '/json';
                    console.log(url);
                    $.ajax({
                        url: url,
                        dataType: 'jsonp',
                        crossDomain: true,
                        contentType: "application/json",
                        success : function(json){
                            if(json.logradouro){
                                $("input[name=endereco]").val(json.logradouro);
                                $("input[name=bairro]").val(json.bairro);
                                $("input[name=cidade]").val(json.localidade);
                                $("input[name=uf]").val(json.uf);
                            }
                        }
                    });
                }
            });

        });
    </script>
@endsection



<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Séries</title>
</head>
<body>
<div class="container">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('listar_series') }}">Alunos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listar_produtos') }}">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('listar_turmas') }}">Turmas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('form_criar_loja') }}">Loja</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('form_import_csv') }}">importar csv</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">relatorio de vendas</a>
        </li>
    </ul>
</div>
<div class="container">
    <div class="jumbotron">
        <h1>@yield('cabecalho')</h1>
    </div>
    @yield('conteudo')
</div>
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

</body>
</html>

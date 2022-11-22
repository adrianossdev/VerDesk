<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>VerDesk</title>
<link rel="stylesheet" href="{{ asset ('css/estilo.css') }}">
</head>

<body>
<!-- inicio menu -->
<header>
	@include('app.layouts._partials.menu')
</header>
<!-- fim menu -->
<!-- inicio conteudo -->
<div class="container text-center">
    <div class="card-header bg-success mt-2">
		<h3 class="text-white text-center">Controle de Usuários</h3>
	</div>
        <table class="table table-bordered table-hover bg-light text-center">
            <thead>
                <tr class="bg-success text-white">
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cadastros as $cadastro)
                <tr>
                <th class="col-1" scope="row">{{$cadastro->id}}</th>
                <td>{{$cadastro->nome}}</td>
                <td>{{$cadastro->email}}</td>
                <td class="col-1">{{$cadastro->usuario->ds_usuario_tipos}}</td>      
                <td class="col-1 bg-info"><a class="text-white" href="{{route('usuario.edit', ['usuario' => $cadastro->id])}}" style="text-decoration:none;">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        {{$cadastros->appends($request)->links()}}
        <br>
        <h6>Exibindo {{$cadastros->count()}} usuários de {{$cadastros->total()}}</h6>
	</div>	
</div>
<!-- fim conteudo -->
<!-- inicio rodapé -->
<footer class="bg-success text-center">
	Todos os direitos reservados VerDesk &copy 2022 - versão 1.0
</footer>
<!-- fim rodapé -->
</body>
</html>
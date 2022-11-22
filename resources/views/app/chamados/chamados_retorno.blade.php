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
<div class="container">
	<div class="text-center">
		<div class="card-header bg-success mt-1 col-4">
			<h3 class="text-white">Consulta de Chamados</h3>
		</div>
        <div class="card-body bg-white">
            <form class="form-group " action="">
                <div class="row">
                <input class="form-control col-2 text-center" type="text" placeholder="Número">
                <input class="form-control col-2 text-center" type="text" placeholder="Assunto">
                <input class="form-control col-2 text-center" type="text" placeholder="Setor">
                <input class="form-control col-2 text-center" type="text" placeholder="Tipo">
                </div>
                <div class="row">
                <input class="form-control col-2 text-center" type="text" placeholder="Autor">
                <input class="form-control col-2 text-center" type="text" placeholder="Data">
                <input class="form-control col-2 text-center" type="text" placeholder="Status">    
                </div>
            <button type="submit" class="btn btn-primary mt-2">Pesquisar</button>
            </form>
		</div>
        <div class="card-header bg-success mt-2">
			<h3 class="text-white">Últimos Chamados</h3>
		</div>
        <table class="table table-bordered table-hover bg-light text-center">
            <thead>
                <tr class="bg-success text-white">
                <th scope="col">Número</th>
                <th scope="col">Assunto</th>
                <th scope="col">Setor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Autor</th>
                <th scope="col">Data</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
                @if($_SESSION['tipo'] == 3)
                <th scope="col"></th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($chamados as $chamado)
                <tr>
                <th scope="row">{{$chamado->id}}</th>
                <td>{{$chamado->assunto}}</td>
                <td>{{$chamado->setor->ds_setor_chamado}}</td>
                <td>{{$chamado->tipo->ds_tipo_chamado}}</td>
                <td>{{$chamado->usuario->nome}}</td>
                <td>{{$chamado->data}}</td>
                <td>{{$chamado->status->ds_status_chamado}}</td>
                <td class="bg-info "><a class="text-white" href="{{route('chamado.show', ['chamado' => $chamado->id])}}" style="text-decoration:none;">Abrir</a></td>
                @if($_SESSION['tipo'] == 3)
                <td class="bg-info "><a class="text-white" href="{{route('chamado.edit', ['chamado' => $chamado->id])}}" style="text-decoration:none;">Editar</a></td>   
                @endif   
            </tr>
                @endforeach
            </tbody>
           
        </table>
        {{$chamados->appends($request)->links()}}
        <h6>Exibindo {{$chamados->count()}} chamados de {{$chamados->total()}}</h6>
        <br>
        
        <hr>
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
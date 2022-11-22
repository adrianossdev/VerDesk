@php
				date_default_timezone_set('UTC');
				$data = date("d/m/Y");
				@endphp
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
			<h3 class="text-white">Visualizar chamado</h3> 
		</div>
		<div class="card card-body">
			<!-- Início chamado - primeira interação -->
			<div class="card-item">
				<div class="card-title bg-success text-white">
				<b>ID</b>  {{$chamado->id}} |
				<b>Assunto</b> {{$chamado->assunto}} |
				<b>Setor</b> {{$chamado->setor->ds_setor_chamado}} |
				<b>Tipo</b>  {{$chamado->tipo->ds_tipo_chamado}} 
				</div>
				<b class="text-success">Descrição</b>
				<hr>
				{{$chamado->descricao}}
				<hr>
				<div class="card-footer bg-success text-white">
				<b>Autor</b> {{$chamado->usuario->nome}}
				<b>Data </b> {{$chamado->data}}
				<b>Status </b> {{$chamado->status->ds_status_chamado}}
				</div>			
			</div>
			<!-- Chamado - fim primeira interação -->
			<hr>
			<b class="btn-primary">Nova interação</b>
			<form method="post">
			@csrf
			<textarea class="form-control mt-2" name="descricao"></textarea>
			<b>Autor</b> {{$_SESSION['nome']}} | <b>Data </b>{{$data}}
			<input type="hidden" name="chamado_id" value="{{$chamado->id}}">
			<input type="hidden" name="id" value="{{$_SESSION['id']}}">
			<input type="hidden" name="nome" value="{{$_SESSION['nome']}}">
			<input type="hidden" name="data">
			<br>
			<button type="submit" class="btn btn-primary mt-2">Responder</button>
			@if($_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3)
			<a class="btn btn-danger mt-2 text-white">Finalizar</a>
			@endif
			</form>
		</div>
		
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



				<!--
					<form class="form-group">
				<input class="form-control" type="text" name="assunto" value="" disabled>
				
				<input class="form-control" type="text" name="assunto" value="" disabled>
				<br>
				
				<select name="setor_id" disabled>
					<option value="{{$chamado->setor->id}}" ></option>
				</select>
				
				<select name="tipo_id" disabled>
						<option value="{{$chamado->tipo->id}}"></option>
				</select>
				<hr>
				
				
				<textarea disabled name="descricao" class="form-control" placeholder="Insira a descrição do problema aqui..."></textarea>
				<hr>
				Anexos
				<br>
				<input type="file" name="arquivo" disabled>
				<hr>
				<button type="submit" class="btn btn-success mb-4" disabled>Incluir</button>
				</form>
-->
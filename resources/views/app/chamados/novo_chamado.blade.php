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
			<h3 class="text-white">Novo chamado</h3>
		</div>
		<div class="card card-body">
			<form class="form-group" method="post" action="{{ route('chamado.store') }}">
				@csrf
				<p class="text-success">{{isset($msg) ? $msg : ''}}</p>
				Assunto
				<input class="form-control" type="text" name="assunto" value="{{old('assunto')}}" placeholder="Informe o assunto aqui">
				<p class="text-danger">{{ $errors->has('assunto') ? $errors->first('assunto') : ''}}</p>
				Setor
				<select name="setor_id">
					@foreach ($setores as $setor)
						<option value="{{$setor->id}}">{{$setor->ds_setor_chamado}}</option>
					@endforeach
				</select>
				Tipo
				<select name="tipo_id">
					@foreach ($tipos as $tipo)
						<option value="{{$tipo->id}}">{{$tipo->ds_tipo_chamado}}</option>
					@endforeach
				</select>
				<p class="text-danger">{{ $errors->has('setor_id') ? $errors->first('setor_id') : ''}}</p>
				<p class="text-danger">{{ $errors->has('tipo_id') ? $errors->first('tipo_id') : ''}}</p>
				<hr>
				Descrição:
				<textarea name="descricao" class="form-control" placeholder="Insira a descrição do problema aqui...">{{old('descricao')}}</textarea>
				<p class="text-danger">{{ $errors->has('descricao') ? $errors->first('descricao') : ''}}</p>
				<hr>
				Anexos
				<br>
				<input type="file" name="arquivo">
				<hr>
				<button type="submit" class="btn btn-success mb-4">Incluir</button>
				<br>
				<input type="hidden" name="usuario_id" value="{{$_SESSION['id']}}">
				<!--<h6>Data  {{$data}}</h6> -->
				<input type="hidden" name="data" value="{{$data}}" class="text-center">
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
@if($errors->any())
@endif

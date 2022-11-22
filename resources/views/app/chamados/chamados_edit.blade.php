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
		<div class="card-header col-4 bg-success mt-1">
			<h3 class="text-white">Editar chamado</h3>
		</div>
		<div class="card card-body">
			<form method="post" class="form-group" action="{{route('chamado.update', ['chamado' => $chamado->id])}}">
            @csrf
            @method('PUT')
				Assunto
				<input class="form-control" type="text" name="assunto" value="{{$chamado->assunto}}">
				<p class="text-danger">{{ $errors->has('assunto') ? $errors->first('assunto') : ''}}</p>
				<br>
				Setor
				<select name="setor_id" >
					<option value="{{$chamado->setor->id}}" >{{$chamado->setor->ds_setor_chamado}}</option>
				</select>
				Tipo
				<select name="tipo_id" >
						<option value="{{$chamado->tipo->id}}">{{$chamado->tipo->ds_tipo_chamado}}</option>
				</select>
				<hr>
				Descrição:
				<textarea name="descricao" class="form-control" placeholder="Insira a descrição do problema aqui...">{{$chamado->descricao}}</textarea>
				<p class="text-danger">{{ $errors->has('descricao') ? $errors->first('descricao') : ''}}</p>
				<hr>
				Anexos
				<br>
				<input type="file" name="arquivo" >
				<hr>
				Autor: {{$chamado->usuario->nome}}
				Data : {{$chamado->data}}
				Status: {{$chamado->status->ds_status_chamado}}
				<hr>
                <button type="submit" class="btn btn-success mb-4" >Salvar</button>
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
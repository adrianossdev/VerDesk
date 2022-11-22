@php
    $tipo_usuario = $_SESSION['tipo'];
    if($tipo_usuario == 0){
        $msg = 'Oops! Você não tem permissão de acesso a esta página! Contate um administrador!';
		return view('inicio',$msg);
    }
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
<div class="container text-center">
    <div class="card-header bg-success mt-1 col-4">
		<h3 class="text-white text-center">Edição de Usuários</h3>
	</div>
    <div class="card card-body">
	<form class="form-group col-12" method="post" action="{{route('usuario.update', ['usuario' => $usuario->id])}}">
		@csrf
		@method('PUT')
		
		<label for="id">ID
			<input name="id" class="form-control" type="text" value="{{$usuario->id}}" disabled>
			<br>
		<label for="nome">Nome
			<input name="nome"  class="form-control text-center" type="text" value="{{$usuario->nome}}">
			<p class="text-danger">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</p>
			<br>
			
		<label for="email">Email
			<input name="email" class="form-control text-center" type="email" value="{{$usuario->email}}" disabled>
			<p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</p>
			<br>
		<label for="senha">Senha
			<input name="senha"  class="form-control text-center" type="password" value="{{$usuario->senha}}">
			<p class="text-danger">{{ $errors->has('senha') ? $errors->first('senha') : ''}}</p>
			<br>
			
			<label for="tipoAtual">Tipo Atual
			<input class="form-control text-center" name="tipoAtual" type="text" value="{{$usuario->usuario->ds_usuario_tipos}}" disabled>
			<br>
			<label for="tipo">Novo Tipo:
			<select class="text-center form-control" name="usuario_tipo_id">
			@foreach ($usuario_tipos as $usuario_tipo)
				<option value="{{$usuario_tipo->id}}">{{$usuario_tipo->ds_usuario_tipos}}</option>
			@endforeach
			</select>
			<br>
		<button type="submit" class="btn btn-primary mt-2">Salvar</button>
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
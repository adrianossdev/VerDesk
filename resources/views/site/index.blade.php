<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>VerDesk</title>
<link rel="stylesheet" href="{{ asset ('css/estilo.css') }}">
</head>

<body>
<!-- inicio menu -->
<header>
<div class="logo bg-success text-center">
	<h1><a href="{{ route('site.index') }}" class="text-white" style="text-decoration: none">VerDesk</a></h1>
</div>
</header>
<!-- fim menu -->
<!-- inicio conteudo -->
<div class="container mt-4">
	<div class="col-6 acesso">
		<div class="card cartao">
			<div class="card-header bg-success text-center cartao">
				<h4 class="text-white">Acesso</h4>
			</div>			
			<form class="card-body text-center" action="{{ route('site.index')}}" method="post">	
				@csrf		
				<label for="email" >Email:
				<input type="Email" value="{{ old('email')}}" class="form-control" name="email" placeholder="nome@exemplo.com" >
				{{ $errors->has('email') ? $errors->first('email') : ''}}
				<label for="senha">Senha:
				<input type="password" value="{{ old('senha')}}" class="form-control" name="senha" placeholder="exemplo123" >
				{{ $errors->has('senha') ? $errors->first('senha') : ''}}
				<br>
			
				<button class="btn btn-success mb-4">Entrar</button>
				<p class="text-danger">{{isset($erro) && $erro != '' ? $erro : ''}}</p>				
			</form>
			<div class="card-footer text-center">
			<h6> Esqueceu sua senha? <a class="btn btn-danger btn-sm" href="{{ route('site.recuperarsenha') }}">Recuperar senha</a></h6><hr>
			<h6> Novo por aqui? Realize seu <a class="btn btn-primary btn-sm" href="{{ route('site.cadastro') }}">Cadastro</a></h6>
			</div>
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
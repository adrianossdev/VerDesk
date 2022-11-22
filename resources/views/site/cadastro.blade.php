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
			<!--<div class="card-body text-center"> -->
			@include('site.layouts._components.form_cadastro')
			<!--</div>-->
			<br>
			<div class="card-footer text-center">
			<h6> Esqueceu a senha? <a class="btn btn-danger btn-sm" href="{{ route('site.recuperarsenha') }}">Recuperar senha</a></h6><hr>
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
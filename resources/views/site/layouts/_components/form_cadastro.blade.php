<form class="form-group text-center card-body" action="{{ route('site.cadastro') }}" method="post">
				@csrf
				<label for="nome" >Nome:
				<input type="text" value="{{ old('nome')}}" class="form-control" name="nome" placeholder="Digite seu nome aqui" >
				<p class="text-danger">{{ $errors->has('nome') ? $errors->first('nome') : ''}}</p>
                <label for="email" >Email:
				<input type="Email" value="{{ old('email')}}" class="form-control" name="email" placeholder="nome@example.com" >
				<p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</p>
                <label for="senha">Senha:
				<input type="password" value="{{ old('senha')}}" class="form-control" name="senha" placeholder="exemplo123">
				<p class="text-danger">{{ $errors->has('senha') ? $errors->first('senha') : ''}}</p>
                <label for="senha2">Confirme sua senha:
				<input type="password" value="{{ old('senha2')}}" class="form-control" name="senha2" placeholder="exemplo123">
				<p class="text-danger">{{ $errors->has('senha2') ? $errors->first('senha2') : ''}}</p>
                <br>
				<p class="text-success">{{isset($msg) && $msg != '' ? $msg : ''}}</p>
                <button class="btn btn-success mt-4 mb-4" type="submit">Cadastrar</button>
</form>

@if($errors->any())
@endif

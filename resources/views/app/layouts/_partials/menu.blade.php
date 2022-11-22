@php
  $tipo_usuario = $_SESSION['tipo'];
@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-success">
  <a class="navbar-brand">VerDesk</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    
      <li class="nav-item">
        <a class="nav-link" href="{{ route('app.inicio')}}"><h6> Início</h6></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="{{ route('chamado.create')}}"><h6> Abrir Chamado</h6></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('chamado.index')}}"><h6> Consultar Chamados</h6></a>
      </li>
      
      
	   <li class="nav-item">
        <a class="nav-link" href="{{ route('relatorio.index')}}"><h6> Relatórios</h6></a>
      </li>
	  <!--<li class="nav-item">
        <a class="nav-link" href="#"><h6> Chat</h6></a>
      </li>-->
      @if($tipo_usuario == 3)
      <li class="nav-item">
        <a class="nav-link" href="{{route('usuario.index')}}"><h6> Usuários</h6></a>
      </li>
      @endif
      <li class="nav-item">
      <a class="nav-link" href="#"><h6>{{$_SESSION['email']}}</h6></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('app.sair')}}"><h6>Sair</h6></a>
      </li>
    </ul>
  </div>
</nav>

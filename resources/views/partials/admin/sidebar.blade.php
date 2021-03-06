<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
    <div class="title">
      <h1 class="h4">{{ Auth::user()->name }}</h1>
      <p>Web Designer</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="active"> <a href="/home"><i class="icon-home"></i>Inicio</a></li>
    
    @if( auth()->user()->rol == 1)
    <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Usuarios </a>
      <ul id="dashvariants" class="collapse list-unstyled">
        <li><a href="{{ url('newUser') }}">Nuevo usuario</a></li>
        <li><a href="{{ url('userList') }}">Lista de usuarios</a></li>
    <!--     <li><a href="#">Page</a></li>
        <li><a href="#">Page</a></li> -->
      </ul>
    </li>
    @endif
    <li><a href="#events" aria-expanded="false" data-toggle="collapse"> <i class="icon-padnote"></i>Eventos </a>
      <ul id="events" class="collapse list-unstyled">
        <li><a href="{{ url('newEvent') }}">Crear eventos</a></li>
        <li><a href="{{ url('listEvent') }}">Ver eventos</a></li>
    <!--     <li><a href="#">Page</a></li>
        <li><a href="#">Page</a></li> -->
      </ul>
    </li>
  <!--   <li> <a href="tables.html"> <i class="icon-grid"></i>Tables </a></li>
    <li> <a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
    <li> <a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
    <li> <a href="login.html"> <i class="icon-interface-windows"></i>Login Page</a></li>
  </ul><span class="heading">Extras</span>
  <ul class="list-unstyled">
    <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li> -->
  </ul>
</nav>
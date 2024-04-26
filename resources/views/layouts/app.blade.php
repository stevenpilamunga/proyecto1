<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .navbar-brand i {
      margin-right: 5px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
  <a class="navbar-brand" href="{{route('dashboard')}}">
                    <i class="bi-box text-danger"></i>
                    Steven
                </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
            <i class="fas fa-home me-2"></i>
            Inicio
          </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link"  href="{{ route('cursos.index') }}" >Cursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('generar_ordenes') }}">Generar Órdenes</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
        </li>
        <li class="nav-item">
          
             
              <form method="POST" action="{{ route('logout') }}" class="nav-link btn btn-link text-danger">
                            <i class="fas fa-sign-out-alt me-1"></i>
                              @csrf
                            <x-dropdown-link  :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" style="color: red;">
                                {{ __('Cerrar Sesion') }}
                                </a>
                            </li>
                            </x-dropdown-link>
                        </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container-fluid mt-4">
  <div class="row">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
      <div class="position-sticky py-4 px-2 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">
              <i class="fas fa-home me-2"></i>
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#submenu-cursos" role="button" aria-expanded="false" aria-controls="submenu-cursos">
              <i class="fas fa-book-open me-2"></i>
              Cursos
            </a>
            <div class="collapse" id="submenu-cursos">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('cursos.index') }}">Todos los cursos</a>
                </li>
                <!-- Agrega más opciones de cursos si es necesario -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('generar_ordenes') }}">
              <i class="fas fa-cart-plus me-2"></i>
              Generar Órdenes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              <i class="fas fa-users me-2"></i>
              Usuarios
            </a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4">
      <div class="tittle-group mb-3">
        <h4 class="text-center mb-0">Área de Trabajo</h4>
        @yield('content')
      </div>
    </main>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>



















<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{'resources/css/dashboard.css'}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  @Vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
  <title>PITOE </title>
</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- sidebar start-->
    <div class="bg-light" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <img src="{{ asset('img/logo.png') }}" alt="" width="120px">
      </div>
      <ul class="nav flex-column my-2">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home" class="align-text-bottom"></span>
            <i class="bi bi-speedometer2 mr-2"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file" class="align-text-bottom"></span>
            <i class="bi bi-kanban-fill mr-2"></i> Manage Akun
          </a>
        </li>
        <li class="nav-item  has-submenu">
          <a class="nav-link" href="#">
            <span data-feather="shopping-cart" class="align-text-bottom"></span>
            <i class="bi bi-people-fill mr-2 dropdown-toggle " data-bs-toggle=" dropdown" aria-expanded="false"></i> Manage User
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users" class="align-text-bottom"></span>
            <i class="bi bi-mortarboard-fill mr-2"></i> Jurusan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            <i class="bi bi-house-fill"></i> Ruangan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers" class="align-text-bottom"></span>
            <i class="bi bi-clipboard-fill mr-2"></i> Laporan
          </a>
        </li>
      </ul>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            <i class="bi bi-person-lines-fill mr-2"></i> Siswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            <i class="bi bi-person-fill mr-2"></i> Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            <i class="bi bi-box-arrow-left mr-2"></i> Logout
          </a>
        </li>
      </ul>
    </div>
    </nav>
    <!-- sidebar end-->

    <!-- Navbar-->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom bg-light mb-2 px-3 py-2">
        <div class="d-flex align-item-center">
          <i class="bi bi-list fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Dashboard</h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item-dropdown ">
              <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill me-2"></i> Aryan Sulaiman
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a href="#" class="dropdown-item">Profile</a></li>
                <li><a href="#" class="dropdown-item"><i class="bi bi-pencil-fill"></i> Edit</a></li>
                <li><a href="#" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- navbar end-->

      <div class="container-fluid h-75 p-2">
        @include('komponen.pesan')
        @yield('content')
      </div>

    </div>
  </div>

  <script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")

    toggleButton.onclick = function() {
      el.classList.toggle("toggled")
    };
  </script>

</body>

</html>
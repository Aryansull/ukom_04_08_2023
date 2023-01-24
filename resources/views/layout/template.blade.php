<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{'resources/css/app.css'}}">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
  @Vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>PITOE </title>
</head>
<body>

  <div class="d-flex bg-light" id="wrapper">
  <!-- sidebar start-->
    <div class="bg-primary" id="sidebar-wrapper">
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
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              <i class="bi bi-people-fill mr-2"></i> Manage User                
            </a>
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
              <i class="bi bi-box-arrow-left mr-2"></i> Loguot
            </a>
          </li>
        </ul>
      </div>
    </nav>
  <!-- sidebar end-->

  <!-- Navbar-->
  <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-opacity-75 p-2 mb-4 text-light">
        <div class="d-flex align-item-center">
          <i class="bi bi-list primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Dashboard</h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
      @include('komponen.pesan')

      <div class="container-fluid">
        @yield('content')
      </div>

    </div>
  </div>

  <script>
    var el = document.getElementById("wrapper")
    var toggleButton = document.getElementById("menu-toggle")

    toggleButton.onclick = function(){
      el.classList.toggle("toggled")
    }
  </script>

</body>
</html>
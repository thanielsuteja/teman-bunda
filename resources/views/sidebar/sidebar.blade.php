<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="/css/style.css">

  <title>Document</title>
</head>

<body>
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="img/logoTemanBunda.png" alt="" width="100">
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <i class="bi bi-house-door"></i>
          Beranda
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link link-dark">
          <i class="bi bi-people-fill"></i>
          Cari Caretaker
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link link-dark">
          <i class="bi bi-table"></i>
          Penawaran Kerja
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link link-dark">
          <i class="bi bi-file-text" width="16" height="16"></i>
          Riwayat Transaksi
        </a>
      </li>
      <!-- <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16">
            <use xlink:href="#people-circle"></use>
          </svg>
          Pengaturan
        </a>
      </li> -->
    </ul>
    <!-- <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div> -->
  </div>

  @yield('content')

  <footer class="footer mt-auto py-3 bg-secondary">
    <div class="container">
      <span class="text-white">&copy; Teman Bunda 2021</span>
    </div>
  </footer>

</body>

</html>
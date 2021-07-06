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
  <div class="d-flex flex-column flex-shrink-0 bg-light sidebar">
    <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
      <img src="img/logoTemanBunda.png" alt="" width="40" height="32">
      <span class="visually-hidden">Icon-only</span>
    </a>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home" style="border-radius: 0px;">
          <i class="bi bi-house-door" width="24" height="24" role="img" aria-label="Home"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard" style="border-radius: 0px;">
          <i class="bi bi-people-fill" width="24" height="24" role="img" aria-label="Cari Caretaker"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders" style="border-radius: 0px;">
          <i class="bi bi-table" width="24" height="24" role="img" aria-label="Penawaran"></i>
        </a>
      </li class="nav-item">
      <li>
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products" style="border-radius: 0px;">
          <i class="bi bi-file-text" width="24" height="24" role="img" aria-label="Home"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers" style="border-radius: 0px;">
        <i class="bi bi-gear" width="24" height="24" role="img" aria-label="Home"></i>
        </a>
      </li>
    </ul>
    <div class="dropdown border-top">
      <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

  <!-- <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
    <a href="/" class="d-block align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="img/logoTemanBunda.png" alt="" width="100">
    </a>
    <hr>
    <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
      <li class="nav-item">
        <a href="#" class="nav-link active py-3 border bottom" aria-current="page">
          <i class="bi bi-house-door" width="24" height="24" role="img"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border bottom">
          <i class="bi bi-people-fill" width="24" height="24" role="img"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border bottom">
          <i class="bi bi-table" width="24" height="24" role="img"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link py-3 border bottom">
          <i class="bi bi-file-text" width="24" height="24" role="img"></i>
        </a>
      </li>
    </ul>
  </div> -->

  @yield('content')

  <footer class="footer mt-auto py-3 bg-secondary">
    <div class="container">
      <span class="text-white">&copy; Teman Bunda 2021</span>
    </div>
  </footer>

</body>

</html>
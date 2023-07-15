<style>
  .navbar{
    z-index: 999;
  }
  .btn-primary {
    border: 0;
    background: red !important;
  }

  .btn:focus {
    outline: none !important;
    box-shadow: none !important;
  }

  .bg-white {
    background-color: #ffffff;
  }
</style>

<nav class="navbar navbar-expand-sm navbar-light bg-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
      <img src="./assets/img/logo.jpg" alt="Logo" style="width:200px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav align-items-center"" >
        <li class=" nav-item">
        <a class="nav-link active" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Practice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tournaments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Equipments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Schedule</a>
        </li>
        <li>
          <a href="./login.php">
            <button type="button" class="btn btn-primary btn-sm" id="login">LOG IN</button>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
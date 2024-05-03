<?php
include_once("koneksi.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/poliklinik/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="#" rel="stylesheet">
  </head>
  <body>
    <!-- /navbar start -->
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Sistem Informasi Poliklinik
      </a>
      <button class="navbar-toggler"
      type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false"
      aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Master</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li>
              <a class="dropdown-item" href="dokter.php">Dokter</a>
              </li>
              <li>
              <a class="dropdown-item" href="pasien.php">Pasien</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="periksa.php">Periksa</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
</div>
  </nav>
    <!-- /navbar end -->

    <!-- /start.container -->
    <main role="main" class="container mt-4">
        <?php
            if (isset($_GET['page'])) {
            ?>
                <h2><?php echo ucwords($_GET['page']) ?></h2>
            <?php
                include($_GET['page'] . ".php");
            } else {
                echo "Selamat Datang di Sistem Informasi Poliklinik";
            }
        ?>
    </main>
    <!-- /end.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/poliklinik/js/vendor/popper.min.js"></script>
    <script src="/poliklinik/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
include_once("koneksi.php");
?>
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

 <!-- Kode php untuk menghubungkan form dengan database -->
 <form class="form horizontal" method="POST" action="" name="myForm" onsubmit="return(validate());">
  <?php
    $pasien = '';
    $dokter = '';
    $tgl_periksa = '';
    $catatan = '';
    if (isset($_GET['id'])) {
        $ambil = mysqli_query($mysqli, "SELECT * FROM periksa 
        WHERE id='" . $_GET['id'] . "'");
        while ($row = mysqli_fetch_array($ambil)) {
            $pasien = $row['pasien'];
            $dokter = $row['dokter'];
            $tgl_periksa = $row['tgl_periksa'];
            $catatan = $row['catatan'];
        }
    ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <?php
}
?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="mt-4">
                        <h3>Periksa</h3>
    </div>

    <div>
    <div class="col">
        <label for="inputpasien" class="form-label fw-bold">
            Pasien
        </label>
        <input type="text" class="form-control" name="pasien" id="inputpasien" placeholder="Nama" value="<?php echo $pasien ?>">
    </div>
    <div class="col">
        <label for="inputdokter" class="form-label fw-bold">
            Dokter
        </label>
        <input type="text" class="form-control" name="dokter" id="inputdokter" placeholder="Dokter" value="<?php echo $dokter ?>">
    </div>
    <div class="col">
        <label for="inputtgl_periksa" class="form-label fw-bold">
            Tanggal Periksa
        </label>
        <input type="datetime-local" class="form-control" name="tgl_periksa" id="inputtgl_periksa" placeholder="Tanggal Periksa" value="<?php echo $tgl_periksa ?>">
    </div>
    <div class="col">
        <label for="inputalamat" class="form-label fw-bold">
            Catatan
        </label>
        <input type="text" class="form-control" name="catatan" id="inputcatatan" placeholder="Catatan" value="<?php echo $catatan ?>">
    </div>
    <div class="col">
            <button type="submit" class="btn btn-primary rounded-pill px-3 mt-3" name="simpan">Simpan</button>
        </div>
    </div>
</div>
</form>

<!-- Table-->
<table class="table table-hover mt-3">
    <!--thead atau baris judul-->
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Tanggal Periksa</th>
            <th scope="col">Catatan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <!--tbody bernama nama tabel sesuai dengan judul atau head-->
    <tbody>

    <!-- Kode PHP untuk menampilkan semua nama dari tabel urut berdasarkan status dan tanggal awal-->
    <?php
        $result = mysqli_query(
            $mysqli,"SELECT * FROM periksa ORDER BY 'pasien'"
            );
        $no = 1;
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $data['pasien'] ?></td>
                <td><?php echo $data['dokter'] ?></td>
                <td><?php echo $data['tgl_periksa'] ?></td>
                <td><?php echo $data['catatan'] ?></td>
                <td>
                    <a class="btn btn-info rounded-pill px-3" 
                    href="periksa.php?id=<?php echo $data['id'] ?>">Ubah
                    </a>
                    <a class="btn btn-danger rounded-pill px-3" 
                    href="periksa.php?id=<?php echo $data['id'] ?>&aksi=hapus">Hapus
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
if (isset($_POST['simpan'])) {
    if (isset($_POST['id'])) {
        $ubah = mysqli_query($mysqli, "UPDATE periksa SET 
                                        pasien = '" . $_POST['pasien'] . "',
                                        dokter = '" . $_POST['dokter'] . "',
                                        tgl_periksa = '" . $_POST['tgl_periksa'] . "'
                                        catatan = '" . $_POST['catatan'] . "'
                                        WHERE
                                        id = '" . $_POST['id'] . "'");
    } else {
        $tambah = mysqli_query($mysqli, "INSERT INTO periksa(pasien,dokter,tgl_periksa,catatan,status) 
                                        VALUES ( 
                                            '" . $_POST['pasien'] . "',
                                            '" . $_POST['dokter'] . "',
                                            '" . $_POST['tgl_periksa'] . "',
                                            '" . $_POST['catatan'] . "',
                                            '0'
                                            )");
    }

    echo "<script> 
            document.location='periksa.php';
            </script>";
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        $hapus = mysqli_query($mysqli, "DELETE FROM periksa WHERE id = '" . $_GET['id'] . "'");
    } else if ($_GET['aksi'] == 'ubah_status') {
        $ubah_status = mysqli_query($mysqli, "UPDATE periksa SET 
                                        status = '" . $_GET['status'] . "' 
                                        WHERE
                                        id = '" . $_GET['id'] . "'");
    }

     echo "<script> 
            document.location='periksa.php';
            </script>";
}
?>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/poliklinik/js/vendor/popper.min.js"></script>
    <script src="/poliklinik/js/bootstrap.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Data</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">RPL CELL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="create.php">Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <a href="../auth/logout.php" role="button" class="btn btn-danger">logout</a>
      </form>
    </div>
  </div>
</nav>

    <div class="container">
    <div class="form-tambah mt-5 row justify-content-center">

    <?php
include '../config/koneksi.php';

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nama = $_POST['nama'];
$warna = $_POST['warna'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];


$sql = "INSERT INTO tb_konter (nama, warna, deskripsi, harga) VALUES ('$nama', '$warna', '$deskripsi', '$harga')";

        $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location:dashboard.php");
        }
        else {
            echo "Data Gagal disimpan.";

        }

    }
?>

        <h3 align="center">Tambah Data Baru<br>
        Konter XI RPL 1</h3>
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="col-lg-4 mt-3">
            <table class="table-tambah">
                    <label for="nama" class="form-label">Nama</label>
                    <input class="form-control mb-3" type="text" name="nama" id="nama" placeholder="Masukan Merk" required>

                    <label for="warna" class="form-label">Warna</label>
                    <input class="form-control mb-3" type="text" name="warna" id="warna" placeholder="Masukan Warna" required>
  
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control mb-3" type="text" name="deskripsi" id="deskripsi" placeholder="Masukan Deskripsi" required></textarea>

                    <label for="harga" class="form-label">Harga</label>
                    <input class="form-control mb-3" type="text" name="harga" id="harga" placeholder="Masukan Harga" required>

                <br>
            </table>
            
            <div class="button-group mb-5">
                <button type="submit" class="btn btn-success" value="submit">Tambah</button>
                <a href="dashboard.php" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM tb_konter WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $warna = htmlspecialchars($_POST['warna']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga = htmlspecialchars($_POST['harga']);
    $status = htmlspecialchars($_POST['status']);

    $sql_update = "UPDATE tb_konter SET
    nama='$nama',
    warna='$warna',
    deskripsi='$deskripsi',
    harga='$harga',
    status='$status'
    WHERE id='$id'";

    if (mysqli_query($koneksi, $sql_update)) {
        header("Location: dashboard.php");
        exit;
    }else {
        echo "Error: ".mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="form-edit mt-5 row justify-content-center">
        <h2 align="center">Edit Data Handphone</h2>
            <form method="POST" class="col-lg-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control mb-1" name="nama" id="nama" value=
                "<?php echo $data['nama']; ?>" required>
                <br>
                <label for="warna" class="form-label">Warna</label>
                <input type="text" class="form-control mb-1" name="warna" id="warna" value=
                "<?php echo $data['warna']; ?>" required>
                <br>
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control mb-1" id="deskripsi" required><?php echo trim($data['deskripsi']); ?></textarea>
                <br>
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control mb-1" name="harga" id="harga" value=
                "<?php echo $data['harga']; ?>" required>
                <br>
                <label>Status</label>
                <select name="status" class="form-control">
                <option value="Tersedia">Tersedia</option>
                <option value="Dibeli">Dibeli</option>
                </select>
                <br>
                <button type="submit" name="submit" class="btn btn-success mb-5">Simpan</button>
                    <a href="dashboard.php" class="btn btn-danger mb-5">Batal</a>
        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
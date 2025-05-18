<?php
include '../config/koneksi.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$user_id = $_SESSION['username'];

// Ambil data peminjaman user dari tabel "peminjaman"
$query = mysqli_query($koneksi, "
    SELECT p.*, k.nama, k.warna, k.deskripsi, k.harga
    FROM peminjaman p 
    JOIN tb_konter k ON p.tb_konter_id = k.id 
    WHERE p.tb_user_id = '$user_id'
");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
      </ul>
      <form class="d-flex" role="search">
        <a href="../auth/logout.php" role="button" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
      </form>
    </div>
  </div>
</nav>

<div class="container mt-5">
<h2 align="center" class="my-4" >Data Peminjaman</h2>

<div class="table-responsive">
        <thead>
        <tr>
       <table class="table table-hover">
            <tr class="table-utama table-dark bg-dark">           
            <th>No</th>
            <th>Nama</th>
            <th>Warna</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Tgl Pinjam</th>
        </tr>

            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($query)) { 
            ?>
        </thead>
        <tbody>    
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['warna'] ?></td>
                <td><?= $row['deskripsi'] ?></td>
                <td>Rp <?= $row['harga']?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal_pinjam'])) ?></td>
                <td>
            </td>
            </tr>
            
            </tbody>    
            <?php } ?>
    </table>
</div>
            </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_start();

// Optional: Cek apakah user belum login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
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
        <li class="nav-item">
          <a class="nav-link active" href="modul/mod_petugas.php">Data Petugas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="data_pinjam.php">Data Pinjaman</a>
        </li>
      </ul>
      <form class="d-flex align-items-center">
        <span class="text-white me-4 d-flex">
          Hai, <?php echo htmlspecialchars($_SESSION['nama']); ?>
        </span>
        <a href="../auth/logout.php" role="button" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> logout</a>
      </form>
    </div>
  </div>
</nav>

    <div class="container mt-5">
        <h2>Data Handphone</h2>

<?php

if (!isset($_SESSION['username'])) {
    header("Location: auth/login.php");
    exit();
}
?>        

<?php
include '../config/koneksi.php';
if (isset($_GET['id'])) {
    $id=htmlspecialchars($_GET["id"]);

    $sql="delete from tb_konter where id='$id' ";
    $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location: index.php");
        }
    }
?>
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
            <th>Aksi</th>
            <th>Status</th>
        </tr>

        <?php
        include '../config/koneksi.php';
        $sql="select * from tb_konter order by id";

        $hasil=mysqli_query($koneksi,$sql);
        $id=0;
        while ($row = mysqli_fetch_array($hasil)) {
            $id++;

            ?>

        </thead>    
        <tbody>
            <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $row ['nama'];?></td>
            <td><?php echo $row ['warna'];?></td>
            <td><?php echo $row ['deskripsi'];?></td>
            <td><?php echo $row ['harga'];?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="dashboard.php?id=<?php echo $row['id']; ?>" onclick="return confirm
                ('Apakah anda yakin ingin menghapus data ini?')"
                class="btn btn-danger"><i class="bi bi-trash"></i></a>
            </td>
            <td>
              <span style="color: <?php echo ($row['status'] == 'Tersedia') ? 'green' : 'red'; ?>; font-weight:bold;">
              <?php echo $row['status']; ?>
              </span>
            </td>
        </tr>
        </tbody> 
        <?php
        }
        ?>   
    </table>
</div>
      </div>
<div class="d-flex justify-content-center mt-5">
        <a href="create.php" role="button" class="btn btn-info">Tambah Data</a>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

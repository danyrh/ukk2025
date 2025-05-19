<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php2</title>
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
          <a class="nav-link active" aria-current="page" href="../dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="create.php">Data</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <a href="../../auth/logout.php" role="button" class="btn btn-danger">logout</a>
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
include '../../config/koneksi.php';
if (isset($_GET['id'])) {
    $id=htmlspecialchars($_GET["id"]);

    $sql="delete from tb_user where id='$id' ";
    $hasil=mysqli_query($koneksi,$sql);

        if ($hasil) {
            header("Location: mod_petugas.php");
        }
    }
?>

        <thead>
        <tr>
       <table class="table table-hover">
            <tr class="table-utama table-dark bg-dark">           
            <th>No</th>
            <th>Nama</th>
            <th>username</th>
            <th>email</th>
            <th>level</th>
            <th>Aksi</th>
        </tr>

        <?php
        include '../../config/koneksi.php';
        $sql="select * from tb_user order by id";

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
            <td><?php echo $row ['username'];?></td>
            <td><?php echo $row ['email'];?></td>
            <td><?php echo $row ['level'];?></td>
            <td><a href="edit_petugas.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Ubah</a>
                <a href="mod_petugas.php?id=<?php echo $row['id']; ?>" onclick="return confirm
                ('Apakah anda yakin ingin menghapus data ini?')"
                class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        </tbody> 
        <?php
        }
        ?>   
    </table>
</div>
<div class="d-flex justify-content-center mt-5">
        <a href="create_petugas.php" role="button" class="btn btn-info">Tambah Petugas</a>
</div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

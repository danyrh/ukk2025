<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data</title>
</head>
<body>
    <div class="container">

    <?php
include 'koneksi.php';

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


// Persiapkan query SQL untuk memasukkan data
$sql = "INSERT INTO tb_konter (nama, warna, deskripsi, harga) VALUES ('$nama', '$warna', '$deskripsi', '$harga')";

// Eksekusi dan cek apakah berhasil
        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($koneksi,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "Data Gagal disimpan.";

        }

    }
?>

        <h3>Tambah Data Baru<br>
        Konter XI RPL 1</h3>
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <table class="table-tambah">
                <tr>
                    <td>Merk HP</td></td>
                    <td><input type="text" name="nama" placeholder="Masukan Merk" required></td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td><input type="text" name="warna" placeholder="Masukan Warna HP" required></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" rows="5" placeholder="Masukan Deskripsi HP" required></textarea></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" placeholder="Masukan Harga" required></td>
                </tr>
            </table>
            
            <div class="button-group">
                <button type="submit" class="btn-submit" value="submit">Tambah</button>
                <a href="index.php" class="btn-view">Lihat Data</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
session_start();
include '../config/koneksi.php'; // Sesuaikan path koneksi jika berbeda

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Update status menjadi 'Dibeli'
$query = "UPDATE tb_konter SET status='Dipinjam' WHERE id='$id'";
mysqli_query($koneksi, $query);

// Insert peminjaman
$query2 = "INSERT INTO peminjaman (tb_user_id, tb_konter_id, status) 
           VALUES ('$user_id', '$id', 'Dipinjam')";
mysqli_query($koneksi, $query2);

$_SESSION['pesan'] = "Handphone berhasil dipinjam!";

// Redirect kembali ke halaman data user
header("Location: dashboard_user.php");
exit;
?>
<?php
session_start();
include '../config/koneksi.php'; // atau sesuaikan path

$id = $_GET['id'];

$result = mysqli_query($koneksi, "SELECT tb_konter_id FROM peminjaman WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
$tb_konter_id = $data['tb_konter_id'];

// Update status peminjaman jadi Dikembalikan
mysqli_query($koneksi, "UPDATE peminjaman SET status='Dikembalikan' WHERE id='$id'");

// Update status konter jadi Tersedia
mysqli_query($koneksi, "UPDATE tb_konter SET status='Tersedia' WHERE id='$id'");

$_SESSION['pesan'] = "Handphone berhasil dikembalikan!";

header("Location: dashboard_user.php");
?>
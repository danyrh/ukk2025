<?php
session_start();
include '../config/koneksi.php'; // atau sesuaikan path

$id = $_GET['id'];

mysqli_query($koneksi, "UPDATE tb_konter SET status='Dikembalikan' WHERE id='$id'");

$_SESSION['pesan'] = "Handphone berhasil dikembalikan!";

header("Location: dashboard_user.php"); // atau halaman sebelumnya
?>
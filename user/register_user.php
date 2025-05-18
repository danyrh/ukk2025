<?php
session_start();
include '../config/koneksi.php';

// Proses form saat disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']); 
    $password = trim($_POST['password']);
    $level = 'user';

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "Username dan password tidak boleh kosong.";
    } else {
        // Cek apakah username sudah digunakan
        $check = $koneksi->prepare("SELECT id FROM tb_user WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            echo "Username sudah terdaftar. Silakan pilih yang lain.";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            

            // Simpan ke database
            $stmt = $koneksi->prepare("INSERT INTO tb_user (nama, username, email, password, level) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss",$nama, $username, $email,  $hashed_password, $level);

            if ($stmt->execute()) {
                header("Location: login_user.php");
            } else {
                echo "Terjadi kesalahan: " . $stmt->error;
            }

            $stmt->close();
        }

        $check->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        html,body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
  background-color:rgb(233, 233, 233);
  border: 1px solid rgb(122, 122, 122);
  border-radius: 10px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-control {
    border: 1px solid rgb(41, 98, 255);
}
    </style>

</head>

<body class="text-center">
<main class="form-signin">
    <h2 class="mb-5">Daftar Disini</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="nama" required>
        <label for="floatingPassword">nama</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="username" required>
        <label for="floatingPassword">username</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="email" required>
        <label for="floatingPassword">email</label>
        </div>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingInput" name="password" required>
        <label for="floatingPassword">password</label>
        </div>
        <div>
        <p>Sudah Punya Akun? <a href="login_user.php" class="login-link">Login di sini</a></p>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</main>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

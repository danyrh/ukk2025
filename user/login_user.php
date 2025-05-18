<?php
session_start();
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cegah SQL Injection (wajib saat pakai variabel dalam query!)
    $username = mysqli_real_escape_string($koneksi, $username);

    $result = $koneksi->query("SELECT * FROM tb_user WHERE username='$username'");
    
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['user_id'] = $user['id']; 
            header("Location: dashboard_user.php");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
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
    <h2 class="mb-5">Silahkan Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" name="username" required>
        <label for="floatingPassword">username</label>
        </div>
        <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingInput" name="password" required>
        <label for="floatingPassword">password</label>
        </div>
        <div>
        <p>Belum Punya Akun? <a href="register_user.php" class="register-link">Daftar di sini</a></p>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</main>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
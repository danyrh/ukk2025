<?php
session_start();
session_destroy();
header("Location: ../user/login_user.php");
exit();
?>
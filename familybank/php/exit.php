<?php 
session_start();
unset($_SESSION['user']);
session_destroy();


// setcookie('user', $user['fname'], time() - 3600, "/");
header('Location: /index.html');

 ?>

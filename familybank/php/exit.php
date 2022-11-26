<?php 

setcookie('user', $user['fname'], time() - 3600, "/");
header('Location: /index.html');

 ?>

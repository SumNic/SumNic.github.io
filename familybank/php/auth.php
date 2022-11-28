<?php 
session_start();
$fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$pass = md5($password."thisisforhabr"); // Создаем хэш из пароля
// $pass = password_hash($password, PASSWORD_DEFAULT);

$mysql = new mysqli('dictionary', 'root', '', 'registr');


$result = $mysql->query("SELECT * FROM `table_reg` WHERE `fname` = '$fname'");
$result1 = $mysql->query("SELECT * FROM `table_reg` WHERE `fname` = '$fname' AND `password` = '$pass'");
$user = $result->fetch_assoc(); // Конвертируем в массив
$user1 = $result1->fetch_assoc(); // Конвертируем в массив

if(empty($user) and empty($user1)){
	
	echo 
	'<script>

	var result = confirm(\'Такой пользователь не найден. Вернуться на страницу входа?\')

	if (result) {
		window.location.href = \'/auth.html\';
	} else {
		window.location.href = \'/index.html\';
	}
	</script>';
	exit();
}
else if(!empty($user) and empty($user1)){
	
	echo '<script>

	var result = confirm(\'Пароль введен неверно. Вернуться на страницу входа?\')

	if (result) {
		window.location.href = \'/auth.html\';
	} else {
		window.location.href = \'/index.html\';
	}
	</script>';
	exit();
}
$_SESSION['user']=$user['fname'];	 
// setcookie('user', $user['fname'], time() + 3600, "/");

$mysql->close();

header('Location: /balance.php');

 ?>
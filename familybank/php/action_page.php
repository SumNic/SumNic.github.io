<?php 

$status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

if(mb_strlen($fname) < 3 || mb_strlen($fname) > 20){
	
	echo '<script>

	var result = confirm(\'Недопустимая длина логина. Вернуться на страницу регистрации?\')

	if (result) {
		window.location.href = \'/registration.html\';
	} else {
		window.location.href = \'/home.html\';
	}
	</script>';
	exit();
	
}
else if(mb_strlen($password) < 4){
	
	echo '<script>

	var result = confirm(\'Недопустимая длина пароля. Вернуться на страницу регистрации?\')

	if (result) {
		window.location.href = \'/registration.html\';
	} else {
		window.location.href = \'/home.html\';
	}
	</script>';
	exit();
	
} // Проверяем длину имени

$pass = md5($password."thisisforhabr"); // Создаем хэш из пароля
// $pass = password_hash($password, PASSWORD_DEFAULT);

$mysql = new mysqli('dictionary', 'root', '', 'registr');

$result = $mysql->query("SELECT * FROM `table_reg` WHERE `fname` = '$fname'");
$result1 = $mysql->query("SELECT * FROM `table_reg` WHERE `status` = '$status'");
$user = $result->fetch_assoc(); // Конвертируем в массив
$user1 = $result1->fetch_assoc(); // Конвертируем в массив
if(!empty($user)){
	
	echo '<script>

	var result = confirm(\'Данный логин уже используется! Вернуться на страницу регистрации?\')

	if (result) {
		window.location.href = \'/registration.html\';
	} else {
		window.location.href = \'/index.html\';
	}
	</script>';
	

	exit();
	
} else if (!empty($user1)) {
	echo '<script>

	var result = confirm(\'Данный статус уже используется! Вернуться на страницу регистрации?\')

	if (result) {
		window.location.href = \'/registration.html\';
	} else {
		window.location.href = \'/index.html\';
	}
	</script>';
	

	exit();
}

$sql = "INSERT INTO table_reg (status, fname, password) VALUES ('$status' ,'$fname', '$pass')";
if($mysql->query($sql)){
    echo "Данные успешно добавлены";
	
} else{
    echo "Ошибка: " . $mysql->error;
	exit();
}

$result2 = $mysql->query("SELECT * FROM `table_reg` WHERE `fname` = '$fname'");

$user2 = $result2->fetch_assoc(); // Конвертируем в массив
setcookie('user', $user2['fname'], time() + 3600, "/");

$mysql->close();
header('Location: /balance.php');

 ?>
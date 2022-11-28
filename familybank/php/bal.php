<?php 
session_start();
$fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_STRING);
$sum = filter_var(trim($_POST['sum']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login

    
$fname2 = $_SESSION['user'];
$mysql = new mysqli('dictionary', 'root', '', 'registr');
$result2 = $mysql->query("SELECT `fname`, `sum` FROM `table_reg` WHERE `fname` = '$fname2'");

$user2 = $result2->fetch_assoc(); // Конвертируем в массив

$sum_new2 = $user2['sum'] - $sum;
if ($sum_new2<0) {
    echo '<script>

	var result = confirm(\'У Вас недостаточно средств для данного перевода. Укажите меньшую сумму. Вернуться?\')

	if (result) {
		window.location.href = \'/balance.php\';
	} else {
		window.location.href = \'/balance.php\';
	}
	</script>';
    exit();
}

if ($fname==$fname2) {
    echo '<script>

	var result = confirm(\'Невозможно переводить деньги самому себе. Вернуться?\')

	if (result) {
		window.location.href = \'/balance.php\';
	} else {
		window.location.href = \'/balance.php\';
	}
	</script>';
    exit();
}
$sql = "UPDATE table_reg SET sum='$sum_new2' WHERE `fname` = '$fname2'";

if($mysql->query($sql)){
    echo "Данные успешно добавлены 2";
	
} else{
    echo "Ошибка: " . $mysql->error;
	exit();
}
$mysql->close();

$textarea = filter_var(trim($_POST['textarea']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('dictionary', 'root', '', 'registr');
$sql = "INSERT INTO reg (fname1, fname2, sum, textarea) VALUES ('$fname2' ,'$fname', '$sum', '$textarea')";

if($mysql->query($sql)){
    echo "Данные успешно добавлены 3";
	
} else{
    echo "Ошибка: " . $mysql->error;
	exit();
}
$mysql->close();




$mysql = new mysqli('dictionary', 'root', '', 'registr');

$result = $mysql->query("SELECT `fname`, `sum` FROM `table_reg` WHERE `fname` = '$fname'");

$user = $result->fetch_assoc(); // Конвертируем в массив
$sum_new = $user['sum'] + $sum;

$sql = "UPDATE table_reg SET sum='$sum_new' WHERE `fname` = '$fname'";

if($mysql->query($sql)){
    echo "Данные успешно добавлены 1";
	
} else{
    echo "Ошибка: " . $mysql->error;
	exit();
}
foo:
header('Location: /balance.php');
exit();
 ?>
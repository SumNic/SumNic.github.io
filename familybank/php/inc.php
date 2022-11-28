
<?php
session_start();
$date = filter_var(trim($_POST['date']), FILTER_SANITIZE_STRING);

$fname = $_SESSION['user'];

if(!isset($_SESSION['user'])) {
      echo "<br><br><p>Вы не вошли в систему. <a href='/auth.html'>Войти в систему?</a></p>";
    exit();
      } 
$Y = date("Y");

if ($date == 'day') {
    
    $date1 = date("Y/m/d 00:00:00");
    $date2 = date("Y/m/d 23:59:59");
} else if ($date == 'week'){
    $Monday=strtotime("previous Monday");
    $Sunday=strtotime("Sunday");
    $date1 = date("Y/m/d", $Monday);
    $date2 = date("Y/m/d", $Sunday);
} else if ($date == 'month'){
    $date1 = date("Y/m/01");
    $date2 = date("Y/m/t");
} else if ($date == 'year'){
    $date1 = date("$Y/01/01 00:00:00");
    $date2 = date("$Y/12/31 23:59:59");    
} else {
    $date1 = date("Y/m/d 00:00:00");
    $date2 = date("Y/m/d 23:59:59");
}


$mysql = new mysqli('dictionary', 'root', '', 'registr');

$result = $mysql->query("SELECT * FROM `date` WHERE `fname` = '$fname'");

$user = $result->fetch_assoc(); // Конвертируем в массив
if (empty($user)) {
    $sql = "INSERT INTO date (fname, date1, date2, period) VALUES ('$fname' ,'$date1', '$date2', '$date')";
} else {
$sql = "UPDATE date SET date1='$date1',date2='$date2',period='$date' WHERE `fname` = '$fname'";
}
if($mysql->query($sql)){
    echo "Данные успешно добавлены 1";
	
} else{
    echo "Ошибка: не внеслись даты в таблице date" . $mysql->error;
	exit();
}
    
    header('Location: /income.php');

    exit();

?>


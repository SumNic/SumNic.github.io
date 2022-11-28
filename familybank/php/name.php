<?php
session_start();
    $mysql = new mysqli('dictionary', 'root', '', 'registr');
    $result = $mysql->query("SELECT `fname`,`sum` FROM `table_reg`");
    
    if(!isset($_SESSION['user'])) {
      echo "<br><br><p>Вы не вошли в систему. <a href='/auth.html'>Войти в систему?</a></p>";
    exit();
      } 
    //   else {
    //     echo "Cookie '" . 'user' . "' is set!<br>";
    //     echo "Value is: " . $_COOKIE['user'];
    //   }
    echo "<div class='salute'>
            <h2>Привет, <span>";
            echo $_SESSION['user'];
            echo "!</span></h2>
        </div>";
    echo "
        <div class='action'>
            <form id='myform' action='php/bal.php' method='post'>
                <select name='fname'>
                <option value='none'>--выбери кому переводишь--</option>";

                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . "</option>";
                }
                echo "</select>";
                echo "
                <label for='sum'>Укажите сумму:</label>
                <input type='number' id='sum' name='sum' placeholder='0 рублей' required><br>
                <label for='textarea'>Сообщение:</label>
                <input type='text' maxlength='100' id='textarea' name='textarea' placeholder='введите текст' required><br>
                <input type='submit' form='myform' class='submit__balance' value='Перевести'/>
            </form>            
        </div>
        <div class='balance'>
            Твой баланс: <span>";
            $fname = $_SESSION['user'];
            $result2 = $mysql->query("SELECT `sum` FROM `table_reg`WHERE `fname` = '$fname'");
                
            $sum = $result2->fetch_array(MYSQLI_NUM);
            // var_dump($sum);
            foreach ($sum as $x){
                echo $x;
            }
            // echo $sum['sum'];    
            echo " рублей</span></div>";
?>


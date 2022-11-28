<?php
session_start();
    // $fname = $_COOKIE['user'];
    $fname = $_SESSION['user'];
    // if(!isset($_COOKIE['user'])) {
    if(!isset($_SESSION['user'])) {
      echo "<br><br><p>Вы не вошли в систему. <a href='/auth.html'>Войти в систему?</a></p>";
    exit();
      } 

      $mysql = new mysqli('dictionary', 'root', '', 'registr');

      $result2 = $mysql->query("SELECT * FROM `date` WHERE `fname`='$fname'");
      $user2 = $result2->fetch_array(MYSQLI_ASSOC);
      $date1 = $user2['date1'];
      $date2 = $user2['date2'];
      $period = $user2['period'];
      if ($period == "day") {
          $pr = "день"; 
      } else if ($period == "week") {
          $pr = "неделю"; 
      } else if ($period == "month") {
          $pr = "месяц"; 
      } else if ($period == "year") {
          $pr = "год"; 
      } else {
          $pr = "д"; 
      }
    
    echo "<div class='salute'>
            <h2><span>";
            echo $_SESSION['user'];
            // echo $_COOKIE['user'];
            if ($pr !="д"){
            echo ", это твои доходы за </span><span>";
            echo $pr;
            } else {
                echo ", укажи период</span><span>";
            }
            echo ":</span></h2></div>";

        echo "<div class='action'>
            <form id='myform' action='php/inc.php' method='post'>
                <select id='date' name='date'>
                <option value='none'>--выбери период--</option>
                <option value='day'>День</option>
                <option value='week'>Неделя</option>
                <option value='month'>Месяц</option>
                <option value='year'>Год</option>
                </select>
                <input type='submit' form='myform' id='submit__date' value='Выбрать'/>
            </form>            
        </div>";
        if (empty($user2)) {
            goto foo;
            
        } else {

        echo"<div class='inc'>
        <div class='date'>
            Дата 
        </div>
        <div class='summar'>
            Сумма
        </div>
        <div class='than'>
            От кого
        </div>
        <div class='messeg'>
            Сообщение
        </div>
    </div>";
        }   


        $mysql = new mysqli('dictionary', 'root', '', 'registr');
       
        $result = $mysql->query("SELECT * FROM `reg` WHERE `fname2`='$fname'AND `date` BETWEEN '$date1' AND '$date2'");
        
        
        while ($user = $result->fetch_array(MYSQLI_ASSOC)){ // Конвертируем в массив
        // var_dump($user);
        echo "<div class='inc'>
                <div class='date'>";
                    echo $user['date'];
            echo "</div>
                <div class='summar'>";
                    echo $user['sum'];
            echo "</div>
                <div class='than'>";
                    echo $user['fname1'];
            echo "</div>
                <div class='messeg'>";
                    echo $user['textarea'];
            echo "</div>
            </div>";
        }

        foo:
        $mysql->close();
    
        
?>


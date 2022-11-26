<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Englich</title>
    <link rel="shortcut icon" href="images/icon.png" type="image/png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
  <div class="header__wrapper">
    <div class="btn_one">
        <a href="income.php" class="btn__header"><img src="images/left-arrow.png" alt="Назад" class="logo__pic"></a>
    </div> 
    <div class="logotip">
        <a href="index.html" class="centr__logo"><img src="images/icon.png" alt="Логотип" class="logo__pic"></a>
    </div>
    <div class="btn_one">
        <a href="php/exit.php" class="btn__header"><img src="images/right-arrow.png" alt="Вперед" class="logo__pic"></a>
      </div>
  </div>
</header> 

<div class="container">
    <div class="information">
        
        
        <?php
            include ('php/period2.php');
        ?>
        
                
        
        
        
                
        
    </div> 
</div>

<footer>
                <?php
                    include ('php/footer.php');
                ?>
</footer>
</body>
</html>
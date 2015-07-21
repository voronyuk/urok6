<?php include "base.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Реєстрація користувачів на PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
    <?php
   if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
		  
{  
    // доступ на головну
?>  
     <h1>Закритий розділ!</h1>  
     <p>Привіт, це Ваша сторінка </p>  
	 <p><a href="/logout.php">Вийти</a> </p>  
     <?php  
}    
elseif(!empty($_POST['name']) && !empty($_POST['password']))  
{  
    // користувач йде на сторінку 
    $username = mysql_real_escape_string($_POST['name']);  
    $password = md5(mysql_real_escape_string($_POST['password']));  
  
    $sql_i = "SELECT * FROM users WHERE name = '".$username."' AND Password = '".$password."'";  
    $checklogin=mysql_query($sql_i);
    if(mysql_num_rows($checklogin) == 1)  
    {  
        $row = mysql_fetch_array($checklogin);  
           
 
        $_SESSION['Username'] = $username;  
       $_SESSION['LoggedIn'] = 1;  
		
        echo mysql_error();
		
        echo "<h1>Вітаємо!!!</h1>";  
        echo "<p>Направляємо на закриту сторінку</p>";  
      echo "<meta http-equiv='refresh' content='=2;reestr.php' />"; 
    }  
    else  
    {  
        echo "<h1>Помилка!!!</h1>";  
        echo "<p>Такого логіну немає. Можеш <a href=\"reestr.php\">спробувати ще раз</a>.</p>";  
    } 
}  
else  
{  
    // Форма для авторизації
    ?>   
   <h1>Авторизація</h1>  
 
   <p>Ввійдіть, чи <a href="2_zavd.php">зареєструйтесь</a>.</p>  
 
    <form method="post" action="reestr" name="loginform" id="loginform">  
    <fieldset>  
        <label for="name">Логін:</label><input type="text" name="name" id="name"><br>  
        <label for="password">Пароль:</label><input type="password" name="password" id="password"><br>  
        <input type="submit" name="login" id="login" value="Ввійти">  
    </fieldset>  
    </form>  
    </div>
	
	  <?php  
}  ?>
    </div>
	
	
</body>
</html>
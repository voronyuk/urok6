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
    if(!empty($_POST['name']) && !empty($_POST['password']))  
    {  
    // реєстрація користувачів
    $name = mysql_real_escape_string($_POST['name']);  
    $password = md5(mysql_real_escape_string($_POST['password']));  
    
 
     $checkusername = mysql_query("SELECT * FROM users WHERE name = '".$name."'");  
 
     if(mysql_num_rows($checkusername) == 1 )  
     {  
        echo "<h1>Помилка!!!</h1>";  
        echo "<p>Вибачте, але такий логін вже зареєстрований. Поверніться назад і спробуйте знову.</p>";  
     }  
     else  
     {  
        $registerquery = mysql_query("INSERT INTO users (name, password) VALUES('".$name."', '".$password."')");  
        if($registerquery)  
        {  
            echo "<h1>Вітаємо!!!</h1>";  
            echo "<p>Ваш логін зареєстовано. <a href=\"reestr.php\">Авторизуйтесь</a>.</p>";  
        }  
        else  
        {  
            echo "<h1>Помилка!!!!</h1>";  
            echo "<p>Ви не зареєструвались,спробуйте знову.</p>";      
        }         
     }  
}  
else  
{  
    ?>  
 
   <h1>Реєстрація</h1>  
 
   <p>Заповніть поля.</p>  
 
    <form method="post" action="2_zavd.php" name="registerform" id="registerform">  
    <fieldset>  
        <label for="name">Логін:</label><input type="text" name="name" id="name"><br>  
        <label for="password">Пароль:</label><input type="password" name="password" id="password"><br>  
        <input type="submit" name="register" id="register" value="Зареєструватись">  
    </fieldset>  
    </form>  
 
   <?php  
}  ?>


    </div>
</body>
</html>
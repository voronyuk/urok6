<?php  
session_start();  
 
$dbhost = "localhost"; // Адрес сервера MySQL. На локальном сервере этот параметр всегда будет 'localhost', но на хостинге он соответствует адресу хостера.
$dbname = "opi1"; // Имя базы данных 
$dbuser = "root"; // Пользователь базы данных
$dbpass = ""; // Пароль пользователя базы данных  
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("Помилка MySQL: " . mysql_error());  
mysql_select_db($dbname) or die("Помилка MySQL: " . mysql_error());  
?>
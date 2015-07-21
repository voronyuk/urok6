<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Створення таблиці Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<?php  

$dbhost = "localhost"; 
$dbname = "urok_6"; 
$dbuser = "root"; 
$dbpass = ""; 
 
$link = mysql_connect($dbhost, $dbuser, $dbpass) 
  or die("Помилка MySQL: " . mysql_error()); 
$bd = mysql_select_db($dbname,$link);  
  if($bd==true)
	  {
	print ("Є доступ до бази данних"."<br>");
}
else
{print ("Доступу немає");}

$result = mysql_query ("CREATE TABLE Users (
	  uid INT AUTO_INCREMENT,
	  name varchar(255),
	  password varchar(255),
	  PRIMARY KEY(uid)
	)");
	if ($result == 'true')
			{print "Таблиця Users створена!";
					}
					else{
	              print "Таблиця Users вже є у базі данних!";	}
mysql_close($link);
?>
</div>	
</body>
</html>	

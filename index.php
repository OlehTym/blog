<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Blog</title>
</head>

<body>
    <?php
require_once("DBconfig.php");
session_start();
if (isset($_SESSION["Autorizzation"]) && $_SESSION["Autorizzation"]==TRUE){
$conn=new mysqli(ServerName, UserName, Password, DBName);
$sql = "SELECT `Role` FROM `users` WHERE `login`='{$_SESSION["login"]}'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$role=$row['Role'];
$conn->close();
} else {
  $role='guest';
}
?>
<header>
    <nav class="nav-menu">
        
            <ul >
                <li><a href="index.php">MY_BLOG</a></li>
                <li><a href="">ЗАПИСИ</a>
                    <ul class="drop-menus">
                        <li ><a href="autor-blog.php">Створити запис</a></li>
                        <li ><a href="">Переглянути запис</a></li>
                    </ul>
                </li>
                <?php 
   if ($role == 'Admin' || $role == 'Autor') {
    ?>
                <li ><a href="autor-blog.php">МОЇ ЗАПИСИ</a>
                    <ul>
                        <li><a href="">Переглянути запис</a></li>
                        <li><a href="">Редагувати запис</a></li>
                    </ul>
                </li>
                <?php
   };
   if ($role == 'Admin'){
   ?>
                <li><a href="autor-blog.php">ПАНЕЛЬ АДМІНІСТРАТОРА</a>
                    <ul>
                        <li ><a href="">Створити запис</a></li>
                        <li ><a href="">Редагувати запис</a></li>
                        <li ><a href="">Видалити користувача</a></li>
                    </ul>
                </li>
                <?php
   }
   ?>
                <?php
if (isset($_SESSION["Autorizzation"]) && $_SESSION["Autorizzation"]==TRUE){
  ?>
                <li><img class="avatar" src="./img/anonim_avatar.png" alt=""></li>
                <li><a href="">myblog@gmail.com</a></li>
                <li><a href="outLog.php">ВИХІД</a></li>
                <?php
   } else{
    ?>
                <div class="registration">

                    <li ><a href="sgin-in.php">УВІЙТИ</a></li> /
                    <li ><a href="userinsert.php">ЗАРЕЄСТРУВАТИСЬ</a></li>
                </div>
                <?php
  }
  ?>
            </ul>
    </nav>
    </header>
</body>

</html>
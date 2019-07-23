<?php
require_once("index.php");
require_once("DBconfig.php");
require_once("func.php");
?>
  
  </div>
            <div class="sgin-in-form">
                <p>ФОРМА ВХОДУ</p>
                <form action="sgin-in.php" method="POST" >
<input type="text" class="form-control" name="login"
  id="login" placeholder="ВВЕДІТЬ ЕЛЕКТРОНУ ПОШТУ"> <br>
  <input type="text" class="form-control" name="Password"
  id="password" placeholder="ВВЕДІТЬ ПАРОЛЬ"> <br>
  <button type="submit" class="button-submit">УВІЙТИ</button>
  
                </form>
            </div>
<?php

if ($_SERVER ["REQUEST_METHOD"] =="POST"){
    $conn=new mysqli(ServerName, UserName, Password, DBName);
    if ($conn->connect_error) {
        die ("Помилка з'єднання з БД".$conn->connect_error);
    } else {       
        $Password=PasswordHasher($_POST['Password']);
        $login = $_POST['login'];
        echo $Password.'   '.$login;
        $sql = "SELECT `login`, `Password` FROM `users` WHERE `login`='{$login}' and `Password`='{$Password}'";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        echo "<br>".$result->num_rows."<br>";
        var_dump($row);
        if ($result->num_rows==1){
          Autorization($login);
          header('Location:index.php');
        
            } else {
                echo "все погано";
            }
        
    };
    $conn->close();
    // header("Location: ".$_SERVER['REQUEST_URI']);
}
?>
<?php
require_once("index.php");
require_once("DBconfig.php");
require_once("func.php");
?>
          <div class="registration-form">
                <p>ФОРМА РЕГІСТРАЦІЇ</p>
                <form action="userinsert.php" method="POST" >
<input type="text" class="form-control" name="login"
  id="login" placeholder="ВВЕДІТЬ ЕЛЕКТРОНУ ПОШТУ"> <br>
  <input type="text" class="form-control" name="Password"
  id="password" placeholder="ВВЕДІТЬ ПАРОЛЬ"> <br>
  <input type="text" class="form-control" name="Nick"
  id="nick" placeholder="ВВЕДІТЬ НІК"> <br>
  <input type="file" class="form-control" name="urlAvatar"
  id="l" placeholder="ДОДАЙТЕ АВАТАР"> <br>
  <button type="submit" class="button-submit">ЗАРЕГІСТРУВАТИСЯ</button>
  
                </form>
            </div>
<?php
if ($_SERVER ["REQUEST_METHOD"] =="POST"){
    if ($_POST['login'] == ''){
      die ("Заполните логин");
    } else if($_POST['Password'] == ""){
     die ("Заполните пароль");
    } else if ($_POST['Nick'] == ""){
     die ("заполните ник");
    }
    $conn=new mysqli(ServerName, UserName, Password, DBName);
    if ($conn->connect_error) {
        die ("Помилка з'єднання з БД".$conn->connect_error);
    } else {
        if($_FILES["urlAvatar"]["name"]){
            $expansion=explode('.', $_FILES["urlAvatar"]["name"]);
            var_dump($_FILES);
            var_dump($expansion);
            $FileName=md5(microtime()).".".$expansion[count($expansion)-1]; 
            move_uploaded_file($_FILES["urlAvatar"]["tmp_name"],"img/".$FileName);
        }
        $Password=PasswordHasher($_POST['Password']);
        $login = $_POST['login'];
        $sql = "SELECT * FROM `users` WHERE `login`='{$login}'";
        $result=$conn->query($sql);
        if ($result->num_rows<1){
            $sql = "INSERT INTO `users` (`login`,`Password`,`Nick`,`urlAvatar`) VALUES ('{$_POST['login']}','{$Password}','{$_POST['Nick']}','{$FileName}')";
            if ($conn->query($sql)===TRUE){
                Autorization($login);
                header("Location: index.php");
            } else {
                echo "данні не збереженно".$conn->error;
            }
        } else {
            $row=$result->fetch_assoc();
            echo "{$row['login']} пользователь с таким емайлом уже зарегистрирован";
        }
        
    };
    $conn->close();
}

?>
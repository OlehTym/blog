
<?php
require_once("index.php");
require_once("DBconfig.php");
require_once("func.php");
?>

<?php
$text=($_POST["Text"]);

    $conn=new mysqli(ServerName, UserName, Password, DBName);
    if ($conn->connect_error) {
        die ("Помилка з'єднання з БД".$conn->connect_error);
    }

$conn->query("INSERT INTO `record`(`Text`) VALUES ('$text')");

$conn->close();
?>

<?php
session_start();
$servername="localhost";
$username = "virtualshelf";
$password = "helloworld";
$dbname = "virtualshelf";
$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];
$pass = $_POST['pass'];
$emaillerr = $passerr = "";



if($conn->connect_error)
{
   // echo "Connection not successful\n" . "<br>";
    die("Connection failed: " .$conn->connect_error);
}
    $sql ="SELECT count(*) FROM user WHERE(
		        User_Name='" . $email . "' 
				AND 
				Password='" . $pass . "');";

    //$sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    if($result->num_rows === 0)
    {
        $_SESSION["flag"] = "0";
    }
    else
    {
        $_SESSION["flag"] = "1";
    }

    $conn->close();

if($_SESSION["flag"]==1)
    {header('Location: /shelve/index.html');
    exit;}

else 
    echo "<script type='text/javascript'>alert("Wrong Username or Password");</script>";


?>

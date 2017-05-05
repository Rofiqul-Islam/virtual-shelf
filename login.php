
<?php

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
   // echo "Connection not successful";
    
}
    $sql ="SELECT count(*) FROM user WHERE(
		        User_Name='" . $email . "' 
				AND 
				Password='" . $pass . "');";

    //$sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    if($result->num_rows === 0)
    {
        echo "0";
    }
    else
    {
        echo "1";
    }

    $conn->close();




?>

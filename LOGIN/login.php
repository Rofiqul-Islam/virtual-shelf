
<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 3/28/2017
 * Time: 11:01
 */
$servername="127.0.0.1";
$username = "root";
$password = "";
$dbname = "webproject";
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
        echo "Incorrect Mail Id or Password!!Please check again";
    }
    else
    {
        echo  "1";
    }


$conn->close();
?>

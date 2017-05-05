
<?php
session_start();
$servername="localhost";
$username = "virtualshelf";
$password = "helloworld";
$dbname = "virtualshelf";
$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];

//$pass = md5($_POST['pass']);
$pass=$_POST['pass'];
echo $email;
echo $pass;





if($conn->connect_error)
{
    echo "Connection not successful";
    
}
    $sql ="SELECT count(*) FROM user WHERE(
		        User_Email='" . $email . "' 
				AND 
				Password='" . $pass . "');";

    //$sql = "SELECT * FROM user";
    $result = $conn->query($sql);
    if($result->num_rows === 0)
    {
        $_SESSION["flag"] = "0";
        echo "what";
    }
    else 
    {
        $_SESSION["flag"] = "1";
	         $id="";
	    $sql1="SELECT User_ID from user WHERE(User_Email='" . $email . "' 
				AND 
				Password='" . $pass . "');";

		$result1 = $conn->query($sql1);

		$id=mysqli_fetch_assoc($result1);
		echo $id;
    }

	

   if($_SESSION["flag"]=="0")
   {

   		echo "hello";

   }

    $conn->close();




?>


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






if($conn->connect_error)
{
    echo "Connection not successful";
    
}
    $sql ="SELECT * FROM user WHERE(
		        User_Email='" . $email . "' 
				AND 
				Password='" . $pass . "');";

    //$sql = "SELECT * FROM user";
	$i=0;
    $result = $conn->query($sql);
    while(mysqli_fetch_assoc($result))
    	$i++;
    
    if($i==0)
    {
        $_SESSION["flag"] = "0";
       // echo $_SESSION["flag"];
        
    }
    else 
    {
        $_SESSION["flag"] = "1";
	         $id="";
	    $sql1="SELECT User_ID from user WHERE(User_Email='" . $email . "' 
				AND 
				Password='" . $pass . "');";

		$result1 = $conn->query($sql1);

		while($obj=mysqli_fetch_object($result1))
		$id= $obj->User_ID;

		$_SESSION["user_id"] = $id;
		//echo $_SESSION["flag"];
		
    }

	$conn->close();

   if(strcmp($_SESSION["flag"],"0")==0)
   {

   		echo "<script type='text/javascript'>alert(\"Incorrect Eamil or Password\");</script>";
   		//header("Location: index.html");
		//die();
   	//echo "hello";

   }
   else if(strcmp($_SESSION["flag"],"1")==0)
   {
   		//echo "gelo";
   		header("Location: virtual-shelf/shelve/index.html");
		die();
   }

    




?>

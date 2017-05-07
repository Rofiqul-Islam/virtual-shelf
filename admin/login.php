
<?php
session_start();
$servername="localhost";
$username = "virtualshelf";
$password = "helloworld";
$dbname = "virtualshelf";
$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_POST['email'];

$pass = $_POST['pass'];

//$pass=$_POST['pass'];


$status="0";
$r=0;



if($conn->connect_error)
{
    echo "Connection not successful";
    
}
    $sql ="SELECT * FROM admin WHERE(
		        email='" . $email . "' 
				AND 
				password='" . $pass . "');";

    //$sql = "SELECT * FROM user";
	$i=0;
    $result = $conn->query($sql);
    while(mysqli_fetch_assoc($result))
    	$i++;
    echo $i;
    
    if($i==0)
    {
      
     
        echo '<script type="text/javascript">'; 
        echo 'alert("Incorrect Email or Password");'; 
        echo 'window.location.href = "index.html";';
        echo '</script>';
        
    }
    else 
    {
       
	         $id="";
	    $sql1="SELECT * from admin WHERE(email='" . $email . "' 
				AND 
				password='" . $pass . "');";

		$result1 = $conn->query($sql1);

		while($obj=mysqli_fetch_object($result1))
		{$id= $obj->admin_id;
      $status=$obj->status;}

      echo $status;


  
  if(strcmp($status,"1")==0)
  {	
    session_start();
    $_SESSION["admin_id"] = $id;
      $conn->close();
    header("Location: /admin_home/index.php");
    die();
    
   }
    else
    {
        session_start();
         $_SESSION["flag"] = "0";
         echo '<script type="text/javascript">'; 
        echo 'alert("Account not verified, verify it!");'; 
        echo 'window.location.href = "index.html";';
        echo '</script>';

     }
		
		
    }



   
   

    




?>

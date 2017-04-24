<?php
      $conn = mysqli_connect('localhost', 'root', '','webproject');
	  if($conn->connect_errno>0) echo "not connected";
	  else echo "connected";

	  $username = $_POST["username"];
	  $email = $_POST["email"];
      $reg_no= $_POST["reg_no"];
      $password = $_POST["password"];

	 $sql = "INSERT INTO user (User_name, Password, User_Email, DU_REG_NO, User_Image)  values ('".$username."','".$password."','".$email."','".$reg_no."',null)";

	  if($conn->query($sql) )
		echo "registered Successfully\n";
	  else
	   echo "regestration  Failed";
?>
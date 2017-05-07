<?php
$email=$_GET["email"];
echo $email;
$id=$_GET["id"];
echo $id;
 $conn = mysqli_connect('localhost', 'virtualshelf', 'helloworld','virtualshelf');
	  if($conn->connect_errno>0) echo "not connected";
	  else echo "connected";

	 $sql="UPDATE admin
	SET status = '1' WHERE email='" . $email . "';";
	$result1 = $conn->query($sql);
		$conn->close();

	header("Location: index.html");
        die();

?>
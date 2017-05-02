<?php
      $conn = mysqli_connect('localhost', 'root', '','webproject');
	  if($conn->connect_errno>0) echo "not connected";
	  else echo "connected";

	  $name = $_POST["name"];
	  $subject = $_POST["subject"];
      $speaker= $_POST["speaker"];
      $place = $_POST["place"];
      $dat = date('Y-m-d ', strtotime($_POST["dat"]));

	 $sql = "INSERT INTO seminar (name, subject, speaker, place, seminar_date)  values ('".$name."','".$subject."','".$speaker."','".$place."','".$dat."')";

	  if($conn->query($sql) )
		echo "registered Successfully\n";
	  else
	   echo "regestration  Failed";
	   echo $dat;
?>
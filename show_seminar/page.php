<?php

if(isset($_GET['id'])) {

    $seminar_id = $_GET['id'];
    $con = mysqli_connect('localhost', 'virtualshelf', 'helloworld', 'virtualshelf');
    if ($con->connect_errno > 0) echo "not connected";
    $sql = "select name, subject, speaker, place, date, listener from seminar where id=" .$seminar_id;
    $result = mysqli_query($con, $sql);
    $obj = mysqli_fetch_object($result);
    
   
	
	$myJSON = json_encode($obj);

	echo $myJSON;
}
else echo "nothing";
?>
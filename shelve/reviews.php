<?php

$book_id=$_GET['id'];
$con = mysqli_connect('localhost', 'virtualshelf', 'helloworld', 'virtualshelf');
    if ($con->connect_errno > 0) echo "not connected";
    
	
	$sql = "select Review, User_Name from review where book_id=".$book_id;
	$result = mysqli_query($con, $sql);
	$data="";
	//echo $result->num_rows;
	while($obj=mysqli_fetch_object($result))
	{
		$data=data."<li><h1>".$obj->User_Name."</h1></br><p>".$obj->Review."</p></li>";
		
		
	}
	
	echo $data;


?>
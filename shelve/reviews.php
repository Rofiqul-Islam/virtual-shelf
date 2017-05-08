<?php

$book_id=$_GET['id'];
$con = mysqli_connect('localhost', 'virtualshelf', 'helloworld', 'virtualshelf');
    if ($con->connect_errno > 0) echo "not connected";
    
	
	$sql = "select Review, User_Name from review where book_id=".$book_id;
	$result = mysqli_query($con, $sql);
	$data="<h1 id=\"book_name\"></h1>
                <h2 id=\"author_name\"></h2>
                <p id=\"edition\"></p><br><br><br>";
	//echo $result->num_rows;
	while($obj=mysqli_fetch_object($result))
	{
		$data=$data."<h2>".$obj->User_Name."</h2><p>".$obj->Review."</p>";
		
		
	}
	
	echo $data;


?>
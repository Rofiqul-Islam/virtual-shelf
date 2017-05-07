<?php
session_start();
$user_id=$_SESSION['user_id']
$book_id=$_GET['id'];
$con = mysqli_connect('localhost', 'virtualshelf', 'helloworld', 'virtualshelf');
    if ($con->connect_errno > 0) echo "not connected";
    $sql = "update book set book_like =Book_like+1 where book_id=". $book_id;
	$result = mysqli_query($con, $sql);
	$sql = "select * from liked_books where User_ID=".$user_id."& book_id=".$book_id;
	$result = mysqli_query($con, $sql);
	if($result->num_rows>0)
		echo "again";
	else
	{
		$sql = "INSERT INTO liked_books(User_ID, book_id) VALUES ('".$user_id."','".$book_id."')";
		$result = mysqli_query($con, $sql);
	}


?>
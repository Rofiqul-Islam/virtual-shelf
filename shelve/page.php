<?php

if(isset($_GET['id'])) {
	class myob{
		$book_name;
		$author_name;
		$image;
		$edition;
	}
    $book_id = $_GET['id'];
    $con = mysqli_connect('localhost', 'root', '', 'webproject');
    if ($con->connect_errno > 0) echo "not connected";
    $sql = "select book_name, book_author,edition, Image from book where book_id=" . $book_id;
    $result = mysqli_query($con, $sql);
    $obj = mysqli_fetch_object($result);
    $myob->book_name = $obj->book_name;
    $myob->author_name = $obj->book_author;
    $myob->image = $obj->Image;
    $myob->edition = $obj->edition;
	
	$myJSON = json_encode($myOb);

	echo $myJSON;
}
else echo "nothing";
?>
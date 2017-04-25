<?php
      $conn = mysqli_connect('localhost', 'root', '','webproject');
	  if($conn->connect_errno>0)
	  	 echo "not connected";
	  else echo "connected";

	  $id=$_GET["id"];
	  $author= $_GET["author_name"];
      $book_name= $_GET["book_name"];
      $edition= $_GET["edition"];
      $info=$_GET["info"];
      $review=$_GET["review"];
      $image=$_GET["image"];

	 $sql = "INSERT INTO book (book_id,book_author, book_name, edition, info, Review,image)  values ('".$id."','".$author."','".$book_name."','".$edition."','".$info."','".$review."','".$image."')";

	  if($conn->query($sql) )
		echo "New Book Aded\n";
	  else
	   echo "Failed";
?>
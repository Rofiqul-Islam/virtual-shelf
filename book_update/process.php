<?php
$servername="localhost";
$username = "virtualshelf";
$password = "helloworld";
$dbname = "virtualshelf";
      $conn = mysqli_connect('localhost', 'virtualshelf', 'helloworld','virtualshelf');
	  if($conn->connect_errno>0)
	  	 echo "not connected";
	  else echo "connected";


	  $id=$_POST['id'];
	  $author= $_POST["author_name"];
      $book_name= $_POST["book_name"];
      $edition= $_POST["edition"];
      $info=$_POST["info"];
      $review=$_POST["review"];
      $image=$id.".jpg";

     $uploaddir = '/var/www/html/virtual-shelf/upload/';
$uploadfile = $uploaddir .$id.".jpg";
echo $uploadfile;

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
  

} else {
   echo "Upload failed";
}

echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";

	 $sql = "INSERT INTO book (book_id,book_author, book_name, edition, info, Review,image)  values ('".$id."','".$author."','".$book_name."','".$edition."','".$info."','".$review."','".$image."')";

	  if($conn->query($sql) )
		echo "New Book Aded\n";
	  else
	   echo "Failed";
?>
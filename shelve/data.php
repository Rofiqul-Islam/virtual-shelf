<?php
$con = mysqli_connect('localhost', 'root', '','webproject');
if($con->connect_errno>0) echo "not connected";
$image="default.jpg";
$books_name;
$author_name;
$var=$_GET['num'];
$data="";
$sql="select book_id, book_name, book_author, Image from book limit ".$var;
$ch_image;

$result = mysqli_query($con,$sql);

while($obj=mysqli_fetch_object($result)){
$books_name = $obj->book_name;
$author_name = $obj->book_author;
$ch_image=$obj->Image;
$book_id=$obj->book_id;

if(strcmp($ch_image,"default.jpg")==0)
$data=$data."<li><a href=\"project-detail-page.php?data=".$book_id."\"><img src=".$image."><div class=\"overlay\"><summary><h2>".$books_name."</h2><h3>".$author_name."</h3></summary><><div class=\"loves\"><span>77</span></div></div></a></li>";
else
$data=$data."<li><a href=\"project-detail-page.php?data=".$book_id."\"><img src=".$ch_image."><div class=\"overlay\"><summary><h2>".$books_name."</h2><h3>".$author_name."</h3></summary><><div class=\"loves\"><span>77</span></div></div></a></li>";

if($var==0)break;
$var--;
}
echo $data;

?>
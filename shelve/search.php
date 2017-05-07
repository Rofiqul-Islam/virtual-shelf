<?php
$item=$_GET['item'];
echo $item;
$con = mysqli_connect('localhost', 'root', '','webproject');
if($con->connect_errno>0) echo "not connected";
$sql="select book_name from book where book_name like '%".$item."%';";


$data="";
$result = mysqli_query($con,$sql);

while($obj=mysqli_fetch_object($result))
{
	$data=$data."<li><font size=\"3\">".$obj->book_name."</li>";
	
}	
echo $data;


?>
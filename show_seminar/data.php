<?php
$con = mysqli_connect('localhost', 'virtualshelf', 'helloworld','virtualshelf');
if($con->connect_errno>0) echo "not connected";
$image="default.jpg";
$books_name;
$author_name;
$var=$_GET['num'];
$data="";
$sql="select  * from seminar;";
$ch_image;
$like;
$result = mysqli_query($con,$sql);


while($obj=mysqli_fetch_object($result)){
$seminar_id=$obj->id;
$seminar_name = $obj->name;
$seminar_subject = $obj->subject;
$seminar_speaker=$obj->speaker;
$seminar_place=$obj->place;
$seminar_date=$obj->date;
$seminar_audience=$obj->listener;

$data=$data."<li><a href=\"project-detail-page.php?data=".$seminar_id."\"><img src="."default.jpg"."><div class=\"overlay\"><summary><h2>".$seminar_name."</h2><h3>".$seminar_place."</h3><h3>".$seminar_date."</h3></summary><span>".$seminar_audience." are going</span></div></a></li>";

if($var==0)break;
$var--;
}
echo $data;

?>
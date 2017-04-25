
<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 3/28/2017
 * Time: 11:01
 */
$servername="127.0.0.1";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);

//$email = $_POST['email'];
//$pass = $_POST['pass'];
$emaillerr = $passerr = "";



if($conn->connect_error)
{
   // echo "Connection not successful\n" . "<br>";
    die("Connection failed: " .$conn->connect_error);
}
    $sql ="SELECT * FROM book ;";

    //$sql = "SELECT * FROM user";
    $temp = $conn->query($sql);
    
    
    $str="<center><h1>Database</h1><br><table border='1'><tr><th>ID</th><th>AUTHOR</th><th>BOOK</th><th>EDITION</th><th>INFO</th><th>Like</th><th>Review</th><th>Image</th></tr>";
while($row=$temp->fetch_assoc())
{
    $str=$str."<tr> <td>".$row['book_id']."</td><td>".$row['book_author']."</td><td>".$row['book_name']."</td><td>".$row['edition']."</td><td>".$row['info']."</td></td>".$row['book_like']."</td><td>".$row['Review']."</td><td>".$row['Image']."</td></tr>";

}
$str=$str."</table></center>";
echo $str;

$conn->close();
?>

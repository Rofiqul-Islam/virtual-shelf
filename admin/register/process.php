<?php
session_start();
function sendVerificationBySwift($email,$name,$id)
{
    require_once 'lib/swift_required.php';

    $subject = 'virtual-shelf | Verification'; // Give the email a subject
    $address="http://103.28.121.126/virtual-shelf/admin/verify.php?email=".$email."&id=".$_SESSION["user_id"];
    $body = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$name.'
------------------------
 
Please click this link to activate your account:.
 '.$address;

        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('virtualshelf2965@gmail.com')
            ->setPassword('nomanmarakha')
            ->setEncryption('ssl');

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($subject)
            ->setFrom(array('noreply@virtualshelf.com' => 'Virutal-Shelf'))
            ->setTo(array($email))
            ->setBody($body);

        $result = $mailer->send($message);
}


      $conn = mysqli_connect('localhost', 'virtualshelf', 'helloworld','virtualshelf');
	  if($conn->connect_errno>0) echo "not connected";
	  else echo "connected";

	  $username = $_POST["username"];
	  $email = $_POST["email"];
      
      $password = $_POST["password"];
      $image=$username.".jpg";
      $uploaddir = '/var/www/html/virtual-shelf/userpic/';
	  $img=str_replace(' ','_',$username).".jpg";
      $uploadfile = $uploaddir .$img;
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

      $test="SELECT * from admin WHERE(email='" . $email . "');";
      $i=0;
      $result = $conn->query($test);
      while(mysqli_fetch_assoc($result))
        $i++;

    if($i==0)
	 {
        if($_FILES['userfile']['tmp_name']!=NULL)
        $sql = "INSERT INTO admin (name, password, email, image,status)  values ('".$username."','".$password."','".$email."','".$img."','0')";
    else
    	$sql = "INSERT INTO admin (name, password, email,status)  values ('".$username."','".$password."','".$email."','0')";

	  if($conn->query($sql) )
		echo "registered Successfully\n";
	  else
	   echo "regestration  Failed";

        $sql1="SELECT admin_id from admin WHERE(email='" . $email . "');";

        $result1 = $conn->query($sql1);

        while($obj=mysqli_fetch_object($result1))
        $id= $obj->admin_id;

        $_SESSION["admin_id"] = $id;


	sendVerificationBySwift($email,$username,$_SESSION["user_id"]);
    header("Location: ../index.html");
        die();
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("This Email has been used");'; 
        echo 'window.location.href = "index.html";';
        echo '</script>';

    }
?>
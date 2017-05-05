<?php
function sendVerificationBySwift($email,$name,$id)
{
    require_once 'lib/swift_required.php';

    $subject = 'virtual-shelf | Verification'; // Give the email a subject
    $address="http://103.28.121.126/virtual-shelf/verify?email=".$email."&hash=".$id;
    $body = ';
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
            ->setFrom(array('noreply@lalbus.com' => 'Lalbus'))
            ->setTo(array($email))
            ->setBody($body);

        $result = $mailer->send($message);
}


      $conn = mysqli_connect('localhost', 'virtualshelf', 'helloworld','virtualshelf');
	  if($conn->connect_errno>0) echo "not connected";
	  else echo "connected";

	  $username = $_POST["username"];
	  $email = $_POST["email"];
      $reg_no= $_POST["reg_no"];
      $password = $_POST["password"];

	 $sql = "INSERT INTO user (User_name, Password, User_Email, DU_REG_NO, User_Image)  values ('".$username."','".$password."','".$email."','".$reg_no."',null)";

	  if($conn->query($sql) )
		echo "registered Successfully\n";
	  else
	   echo "regestration  Failed";

	sendVerificationBySwift($email,$username,"1");
?>
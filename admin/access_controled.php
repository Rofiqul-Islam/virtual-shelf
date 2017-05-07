<?php
	session_start();
	if(isset($_SESSION["admin_id"]))
	{
		//echo "Welcome ".$_SESSION['user_id'];
	}
	else
	{
		//echo "hek";
		header('Location: /virtual-shelf/admin/index.html');
	}
?>
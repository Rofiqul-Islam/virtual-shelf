<?php
	session_start();
	if(isset($_SESSION['user_id']))
	{
		echo "Welcome ".$_SESSION['user_id'];
	}
	else
	{
		header('Location: index.html');
	}
?>
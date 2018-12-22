<?php
	session_start();
	session_unset();
	echo "You have Logged Out. <br><a href='index.php'> Go to Main Page </a>";
	header('location:index.php');
			exit();
?>
<?php 
	session_start();
	$object=$_POST['object'];
	$_SESSION['object']=$object;
	echo $object;
?>
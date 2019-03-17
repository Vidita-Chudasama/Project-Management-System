<?php
	error_reporting(0);
	session_start();
	$conn=mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"project_evaluation");
?>
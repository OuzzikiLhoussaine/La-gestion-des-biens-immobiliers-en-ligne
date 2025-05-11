<?php
if (!isset($_SESSION)) {
	session_start();
}
include("include/dbconn.php");

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM `users` WHERE `id`='$user_id'";
	$data = mysqli_query($con, $query);
	if ($data == true) {
		$result = mysqli_fetch_assoc($data);
		//print_r($result);  // to print all data fetch from admin table
	} else {
		echo " Il ya un erreur !!";
	}
} else {
	header("location:../signin.php");
}

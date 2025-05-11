<?php
	include('include/dbconn.php');
	// Retrives User details through the User ID Number
	$id=$_GET['u_id'];
	$query="DELETE FROM `users` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	If($run == true)
	{  
		header('location:users.php');
	}
	else
	{
		$msg="<div class='error'>*** Something is Wrong In DELETE Query! </div>";
	}
?>
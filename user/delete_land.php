<?php
	include('include/dbconn.php');
	$id=$_GET['l_id'];
	$query="DELETE FROM `lands` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	If($run == true)
	{  
		header('location:MY Lands.php');
	}
	else
	{
		$msg="<div class='error'>*** Something is Wrong In DELETE Query! </div>";
	}
?>
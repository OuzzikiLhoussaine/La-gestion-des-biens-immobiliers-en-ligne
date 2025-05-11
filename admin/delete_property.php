<?php
	include('include/dbconn.php');
	$id=$_GET['p_id'];
	$query="DELETE FROM `properties` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	If($run == true)
	{  
		header('location:Properties.php');
	}
	else
	{
		$msg="<div class='error'>*** Something is Wrong In DELETE Query! </div>";
	}
?>
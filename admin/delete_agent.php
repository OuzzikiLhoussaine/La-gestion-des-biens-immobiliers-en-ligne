<?php
	include('include/dbconn.php');
	// Retrives Agent details through the Agent ID Number
	$id=$_GET['a_id'];
	$query="DELETE FROM `agents` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	If($run == true)
	{  
		header('location:Agents.php');
	}
	else
	{
		$msg="<div class='error'>*** Something is Wrong In DELETE Query! </div>";
	}
?>
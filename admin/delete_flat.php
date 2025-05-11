<?php
	include('include/dbconn.php');
	$id=$_GET['f_id'];
	$query="DELETE FROM `flats` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	If($run == true)
	{  
		header('location:Flats.php');
	}
	else
	{
		$msg="<div class='error'>*** Something is Wrong In DELETE Query! </div>";
	}
?>
<?php
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include("include/dbconn.php");
			
	if(isset($_SESSION['admin_id']))
	{
		$admin_id = $_SESSION['admin_id'];
		$query="SELECT * FROM `admin` WHERE `id`='$admin_id'";
		$data=mysqli_query($con,$query);
		if($data == true)
		{
			$result=mysqli_fetch_assoc($data);
			//print_r($result);  // to print all data fetch from admin table
		}
		else
		{
			echo " Something went wrong!";
		}
	}
	else    
	{
		header("location:../adminlogin.php");
	}
?>
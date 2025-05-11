<?php
	// This function is used for checking the email is the email has already registered or not
    function email_exists($email,$con)
	{
		$row=mysqli_query($con, "SELECT `email` FROM `users` WHERE `email`='$email' ");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	/*
	* This function used for checking Customer CNIC Number Weather it is Exists or NOT 
	*/
    function cnic_exists($cnic_no,$con)
	{
		$row=mysqli_query($con, "SELECT `cnic_no` FROM `users` WHERE `cnic_no`='$cnic_no' ");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

// function for the Admin email To check Exists OR NOT.
	function admin_email_exists($email,$con)
	{
		$row=mysqli_query($con, "SELECT email FROM admin WHERE email='$email'");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	
	// checks wheather admin username exists or not
	function admin_username_exists($username,$con)
	{
		$row=mysqli_query($con, "SELECT username FROM admin WHERE username='$username'");
		{
			if(mysqli_num_rows($row)==1) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	} 
	
?>
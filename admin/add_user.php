<?php
	$p_title ="ADD USER";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg2=$msg3='';
    $name=$email=$contact_no=$cnic_no=$address=$fname=$password='';
	include ('include/dbconn.php');
    include ('include/functions.php');
	if(isset($_POST['add']))
    {
        $name               = $_REQUEST['name'];
        $fname              = $_REQUEST['fname'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $contact_no         = $_REQUEST['contactno'];
        $cnic_no            = $_REQUEST['cnicno'];
        $address            = $_REQUEST['address'];
		$user_status = 1;
		
		if (empty($name)) 
	 	{
	 		$msg01="<div class='error'> Enter Your Name </div>";	
	 	}
		elseif (strlen($name) < 2) 
	 	{
	 		$msg01="<div class='error'>Should contain Atleast 3 Letters  </div>";	
	 	}
		elseif (!preg_match("/^[a-zA-Z -]*$/",$name)) 
	 	{
	 		$msg01="<div class='error'>Only Letters are Allowed </div>";	
	 	}
		elseif (empty($fname)) 
	 	{
	 		$msg11="<div class='error'> Enter Your Father Name </div>";	
	 	}
		elseif (strlen($fname) < 2) 
	 	{
	 		$msg11="<div class='error'>Should contain Atleast 3 Letters  </div>";	
	 	}
		elseif (!preg_match("/^[a-zA-Z -]*$/",$fname)) 
	 	{
	 		$msg11="<div class='error'>Only Letters are Allowed </div>";	
	 	}
		elseif (empty($contact_no)) 
	 	{
	 		$msg12="<div class='error'> Enter Your Mobile Number </div>";	
	 	}
		elseif (strlen($contact_no) < 10 AND strlen($contact_no) > 15) 
	 	{
	 		$msg12="<div class='error'>Should contain 11 digits  </div>";	
	 	}
		elseif (!is_numeric($contact_no)) 
	 	{
	 		$msg12="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (empty($cnic_no)) 
	 	{
	 		$msg12="<div class='error'> Enter Your CNIC / Form-B Number </div>";	
	 	}
		elseif (!is_numeric($cnic_no)) 
	 	{
	 		$msg13="<div class='error'>Only Digit are Allowed </div>";	
	 	}
        elseif (cnic_exists($cnic_no,$con)) 
        {
            $msg13="<div class='error'>*** This CNIC Number Already Exists. </div>";  
        }
		elseif (empty($email)) 
	 	{
	 		$msg14="<div class='error'> Enter Your Email. </div>";	
	 	}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 	{
	 		$msg14="<div class='error'> Invalid Email Address </div>";	
	 	}
        elseif (email_exists($email,$con)) 
	 	{
	 		$msg14="<div class='error'>*** This E-Mail Already Exists. </div>";	
	 	}
		elseif (empty($password)) 
	 	{
	 		$msg15="<div class='error'> Enter Your Password </div>";	
	 	}
		elseif (strlen($password) < 3 AND strlen($password) > 21) 
	 	{
	 		$msg15="<div class='error'>Password Length must be between 4 and 20.  </div>";	
	 	}
        else
        {
            $sql = "INSERT INTO `users`(`Name`, `F_name`, `Address`, `cnic_no`, `contact_no`, `user_status`, `email`, `password`) VALUES ('$name','$fname','$address','$cnic_no','$contact_no','$user_status','$email','$password')";
            $data = mysqli_query($con, $sql);
            if($data = true)
            {
                $msg="<script> alert('Record are Successfully Added');</script>";
				if($msg)
				{
					header("Refresh: 0; url=add_user.php");
				}					
            }
            else
            {
                $msg="<div class='error'>*** Something is Wrong IN INSERT Query! </div>";
            }
        }
    }
?>

	<script type="text/javascript">
		function stopcursor(fromTextBox)
		{
			var length= fromTextBox.value.length;
			var maxlength=fromTextBox.getAttribute("maxlength");

			if(length == maxlength)
			{
				document.getElementById().focus();
			}
		}
	</script>
	
	<style type="text/css">
		.error
		{ 
			color: red;
		}
	</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php
			include_once 'include/header.php';
			include_once 'include/sidebar.php';
			
		?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- Content Header (Page header) -->
					<div class="content-header">
					  <div class="container-fluid">
						<div class="row mb-2">
						  <div class="col-sm-6">
							<h1 class="m-0 text-dark">Users Information</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="users.php">Users </a></li>
							  <li class="breadcrumb-item active">ADD User </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> User Information </div>
							<div class="card-body">
							<?php echo $msg; ?>
								<form method="POST">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Name</label>
											<input type="text" name="name" minlength="3" maxlength="55" value="<?php echo $name;?>" placeholder="Enter Your Name..." class="form-control" required />
											<?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Father Name</label>
											<input type="text" name="fname" minlength="3" maxlength="55" value="<?php echo $fname;?>" placeholder="Enter Your Father Name..." class="form-control" required />
											<?php echo $msg11;?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Mobile No</label>
											<input type="text" name="contactno" minlength="11" maxlength="13" onkeyup="stopcursor(this)" value="<?php echo $contact_no;?>" placeholder="Enter Your Mobile Number..." class="form-control" required />
										<?php echo $msg12;?>
										</div>
										<div class="form-group col-sm-6">
											<label> CNIC No</label>
											<input type="text" name="cnicno" minlength="13" maxlength="13" onkeyup="stopcursor(this)" value="<?php echo $cnic_no;?>" placeholder="Enter CNIC Number..." class="form-control" required />
											<?php echo $msg13; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Email </label>
											<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $email;?>" placeholder="Enter Email..." class="form-control" required />
											<?php echo $msg14; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Password </label>
											<input type="text" name="password" minlength="4" maxlength="20" placeholder="Enter Password..." class="form-control" required />
											<?php echo $msg15; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Address </label>
											<textarea name="address" minlength="3" class="form-control" required /><?php echo $address;?></textarea>
										</div>
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="add" class="btn btn-primary col-sm-3"><i class="fa fa-share" style="color: green;"></i> ADD </button>
								</div>
							  </form>
						</div>
					</div>  
				</section>   				
			</div>
			<?php
				
			?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <?php include_once 'include/js.php'; ?>
</body>
 
</html>
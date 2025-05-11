<?php
	$p_title ="Update Agent";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$id=$_GET['a_id'];
	$query="SELECT * FROM `agents` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$result=mysqli_fetch_array($run);
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg2=$msg3='';
    $name=$email=$contact_no=$cnic_no=$address=$image=$password='';
	include ('include/dbconn.php');
    include ('include/functions.php');
	if(isset($_POST['update']))
    {
        $name               = $_REQUEST['name'];
        $status             = $_REQUEST['status'];
        $image              = $_FILES['image']['name'];
		$img_tmp_name		= $_FILES['image']['tmp_name'];
        $contact_no         = $_REQUEST['contactno'];
        $cnic_no            = $_REQUEST['cnicno'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $address            = $_REQUEST['address'];
		
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
		elseif (empty($image)) 
	 	{
	 		$msg11="<div class='error'> Enter Your Father Name </div>";	
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
        elseif (agent_cnic_exists($cnic_no,$con)) 
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
        elseif (agent_email_exists($email,$con)) 
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
            $sql = "UPDATE `agents` SET `Name`='$name',`Mobile_no`='$contact_no',`cnic_no`='$cnic_no',`Address`='$address',`email`='$email',`password`='$password',`image`='$image',`status`='$status' WHERE `id`='$id'";
            $data = mysqli_query($con, $sql);
			move_uploaded_file($img_tmp_name, "agent_images/$image");
            if($data = true)
            {
                $msg="<script> alert('Record are Successfully Added');</script>";
				if($msg)
				{
					header("Refresh: 0; url=add_agent.php");
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
							<h1 class="m-0 text-dark">Agent Details</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="Agents.php">Agents </a></li>
							  <li class="breadcrumb-item active"> Agent Details </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> Agent Details </div>
							<div class="card-body">
							<?php echo $msg; ?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Name</label>
											<input type="text" name="name" minlength="3" maxlength="55" value="<?php echo $result['Name'];?>" placeholder="Enter Your Name..." class="form-control" required />
											<?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Status </label>
											<select name="status" value="<?php echo $result['status'];?>" class="custom-select" required>
												<?php
													if($result['status']=='1')
													{
														echo("<option value='1' selected='selected'> Active</option>");
														echo "<option value='0'>De-active</option>";
													}
													else
													{
														echo "<option value='0' selected='selected'>De-active</option>";
														echo("<option value='1'> Active</option>");
													}
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Mobile No</label>
											<input type="text" name="contactno" minlength="11" maxlength="13" onkeyup="stopcursor(this)" value="<?php echo $result['Mobile_no'];?>" placeholder="Enter Your Mobile Number..." class="form-control" required />
										<?php echo $msg12;?>
										</div>
										<div class="form-group col-sm-6">
											<label> CNIC No</label>
											<input type="text" name="cnicno" minlength="13" maxlength="13" onkeyup="stopcursor(this)" value="<?php echo $result['cnic_no'];?>" placeholder="Enter CNIC Number..." class="form-control" required />
											<?php echo $msg13; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Email </label>
											<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $result['email'];?>" placeholder="Enter Email..." class="form-control" required />
											<?php echo $msg14; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Password </label>
											<input type="text" name="password" value="<?php echo $result['password'];?>" minlength="4" maxlength="20" placeholder="Enter Password..." class="form-control" required />
											<?php echo $msg15; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Address </label>
											<textarea name="address" minlength="3" class="form-control" required /><?php echo $result['Address'];?></textarea>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-6">
													<label> Image1 </label>
													<input type="file" name="image" value="<?php echo $result['image']; ?>" class="form-control" required />
												</div>
												<div class="form-group col-sm-6">
													<img src="agent_images/<?php echo $result['image']; ?>" width="200" height="100" style="float: right; border-radius: 10px;">
												</div>
											</div>
										</div>
										
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="update" class="btn btn-primary col-sm-3"> Update </button>
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
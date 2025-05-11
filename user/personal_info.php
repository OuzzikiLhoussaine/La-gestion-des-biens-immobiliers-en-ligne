<?php
	$p_title ="Personal Information";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3='';
	
	if(isset($_POST['update']))
    {
        $name               = $_REQUEST['name'];
        $fname              = $_REQUEST['fname'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $contact_no         = $_REQUEST['contact_no'];
        $cnic_no            = $_REQUEST['cnic_no'];
		$image 				= $_FILES['image']['name'];
		$image_tmp_name		= $_FILES['image']['tmp_name'];
        $address            = $_REQUEST['address'];
		$id					= $result['id'];
		
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
		// elseif (empty($cnic_no)) 
	 	// {
	 	// 	$msg12="<div class='error'> Enter Your CNIC / Form-B Number </div>";	
	 	// }
		elseif (empty($email)) 
	 	{
	 		$msg14="<div class='error'> Enter Your Email. </div>";	
	 	}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 	{
	 		$msg14="<div class='error'> Invalid Email Address </div>";	
	 	}
		elseif (empty($password)) 
	 	{
	 		$msg15="<div class='error'> Enter Your Password </div>";	
	 	}
		elseif (strlen($password) < 3 AND strlen($password) > 21) 
	 	{
	 		$msg15="<div class='error'>Password Length must be between 4 and 20.  </div>";	
	 	}
		elseif (empty($image)) 
	 	{
	 		$msg16="<div class='error'> Please Your Select Image </div>";	
	 	}
        else
        {
            $sql = "UPDATE `users` SET `Name`='$name',`F_name`='$fname',`Address`='$address',`cnic_no`='$cnic_no',`contact_no`='$contact_no',`email`='$email',`password`='$password',`image`='$image' WHERE `id`='$id'";
            //print_r($sql);
            $data = mysqli_query($con, $sql);
			move_uploaded_file($image_tmp_name, "../admin/user images/$image");
            if($data = true)
            {
                $msg = "<script> alert('SuccessFully Updated'); </script>";
				if($msg)
				header("Refresh: 0; url=personal_info.php");				
            }
            else
            {
                $msg="<div class='error'>*** Something is Wrong IN UPDATE Query! </div>";
            }
        }
    }
?>

<style type="text/css">
	.error
	{ 
		color: red;
	}

</style>
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center"> Informations personnelles</h3>
                    </div>
                </div>
				<section class="content">
					<div class="container-fluid">
						<div class="card card-primary">
							<div class="card-header"> Informations personnelles </div>
							<div class="card-body">
								<form method="POST" enctype="multipart/form-data">
								<?php echo $msg;?>
									<div class="row">
										<div class="form-group col-sm-6">
										  <label> Nom</label>
										  <input type="text" name="name" minlength="3" maxlength="55" class="form-control" value="<?php echo $result['Name']; ?>" required />
										  <?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
										  <label> Nom du père</label>
										  <input type="text" name="fname" minlength="3" maxlength="55" class="form-control" value="<?php echo $result['F_name']; ?>" required />
										  <?php echo $msg11;?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
										  <label> Email </label>
										  <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" value="<?php echo $result['email']; ?>" required />
										  <?php echo $msg14;?>
										</div>
										<div class="form-group col-sm-6">
										  <label> Mot de passe </label>
										  <input type="text" name="password" minlength="4" maxlength="20" class="form-control" value="<?php echo $result['password']; ?>" required />
										  <?php echo $msg15;?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
										  <label> Numéro de téléphone : </label>
										  <input type="text" name="contact_no" minlength="11" maxlength="13" onkeyup="stopcursor(this)" class="form-control" value="<?php echo $result['contact_no']; ?>" required />
										  <?php echo $msg12;?>
										</div>
										<div class="form-group col-sm-6">
										  <label> CINE No: </label>
										  <input type="text" name="cnic_no" minlength="8" maxlength="15" onkeyup="stopcursor(this)" class="form-control" value="<?php echo $result['cnic_no']; ?>" required />
										  <?php echo $msg13;?>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-6">
													<label> Image </label>
													<input type="file" name="image" class="form-control" required />
												</div>
												<div class="form-group col-sm-6">
													<img src="../admin/user images/<?php echo $result['image']; ?>" width="200" height="100" style="float: right; border-radius: 10px;">
												</div>
											</div>
											<?php echo $msg16;?>
										</div>
										<div class="form-group col-sm-6">
										  <label> Address </label>
										  <textarea name="address" minlength="3" class="form-control" required ><?php echo $result['Address']; ?> </textarea>
										</div>
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="update" class="btn btn-primary col-sm-3"> Mise à jour </button>
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
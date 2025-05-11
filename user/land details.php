<?php
	$p_title ="LAND DETAILS";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg01=$msg02=$msg03=$msg04='';
	$name= $email=$contact_no=$message='';
	
	$id=$_GET['l_id'];
	$qry="SELECT * FROM `lands` WHERE `id`='$id'";
	$run=mysqli_query($con,$qry);
	$reslt=mysqli_fetch_array($run);
	
	$u_id = $reslt['u_id'];
	$query1="SELECT * FROM `Users` WHERE `id`='$u_id'";
	$run1=mysqli_query($con,$query1);
	$User_info=mysqli_fetch_array($run1);
	
	if(isset($_POST['send']))
    {
        $name       = $_REQUEST['name'];
        $email      = $_REQUEST['email'];
        $contact_no = $_REQUEST['contact_no'];
        $message    = $_REQUEST['message'];
		$date 		= date('d-m-y h:ia');
		$p_id		= $reslt['id'];
		
		if (empty($name)) 
	 	{
	 		$msg01="<div class='error'> Enter Your Name</div>";	
	 	}
		elseif (!preg_match("/^[a-zA-Z -]*$/",$name)) 
	 	{
	 		$msg01="<div class='error'>Only Letters are Allowed </div>";	
	 	}
		elseif(empty($email)) 
	 	{
	 		$msg02="<div class='error'> Email is Required</div>";	
	 	}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	 	{
	 		$msg02="<div class='error'> Invalid Email Address </div>";	
	 	}
		elseif(empty($contact_no)) 
	 	{
	 		$msg03="<div class='error'>Contact Number is Required</div>";	
	 	}
		elseif (!is_numeric($contact_no)) 
	 	{
	 		$msg03="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif(empty($message)) 
	 	{
	 		$msg04="<div class='error'>Message is Required</div>";	
	 	}
		elseif (strlen($message) < 2) 
	 	{
	 		$msg04="<div class='error'>Should contain Atleast 3 Letters  </div>";	
	 	}
		else
		{
			$sql = "INSERT INTO `comments`(`Name`, `email`, `contact_no`, `comments`, `date`, `p_id`) VALUES ('$name','$email','$contact_no','$message','$date','$p_id')";
            $data = mysqli_query($con, $sql);
            if($data = true)
            {
                $msg="<script> alert('Message Sent Successfully');</script>";
				if($msg)
				{
					header("Refresh: 0; url=land details.php?l_id=".$id);
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
							<h1 class="m-0 text-dark">Détails de villa</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="user_dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="MY Lands.php"> VILLAS </a></li>
							  <li class="breadcrumb-item active"> Détails de villa </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> Informations de Villa </div>
							<div class="card-body">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Surface </label>
											<input readonly value="<?php echo $reslt['area'];?>" class="form-control"/>
										</div>
										<div class="form-group col-sm-6">
											<label> Prix </label>
											<input readonly value="<?php echo $reslt['price'];?>" class="form-control"/>
										</div>								
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Statut </label>
											<input readonly value="<?php echo $reslt['status'];?>" class="form-control"/>
										</div>
										<div class="form-group col-sm-6">
											<label> Date </label>
											<input readonly value="<?php echo $reslt['Date'];?>" class="form-control"/>
										</div>								
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Description </label>
											<textarea readonly class="form-control"><?php echo $reslt['discription'];?>
											</textarea>
										</div>
										<div class="form-group col-sm-6">
											<label> Localisation </label>
											<textarea readonly class="form-control"><?php echo $reslt['location'];?>
											</textarea>
										</div>								
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Image  </label>
											<img src="../admin/property images/<?php echo $reslt['pic']; ?>" width="100%" height="300" style="float: right; border-radius: 10px;">
										</div>
										<div class="form-group col-sm-6">
											<label> Image 2 </label>
											<img src="../admin/property images/<?php echo $reslt['pic2']; ?>" width="100%" height="300" style="float: right; border-radius: 10px;">
										</div>								
									</div>
									
									<div class="row section-t3">
									  <div class="col-sm-12">
										<div class="title-box-d">
										  <h2 class="title-d"> <u> MAP </u></h2>
										</div>
									  </div>
									</div>
									<div class="amenities-list color-text-a">
										<?php $loc=$reslt['location']; ?>
										<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $loc;?>&amp;sspn=33.984987,77.607422&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $loc;?>&amp;z=12&amp;output=embed"></iframe>
									</div>
									
									<div class="col-md-12">
										<div class="row section-t3">
										  <div class="col-sm-12">
											<div class="title-box-d">
											  <h3 class="title-d">Contacter le propriétaire</h3>
											</div>
										  </div>
										</div>
										<div class="row">
										  <div class="col-md-6 col-lg-4">
											<img src="../admin/user images/<?php echo $User_info['image']; ?>" alt="OWNER Image" class="img-fluid">
										  </div>
										  <div class="col-md-6 col-lg-4">
											<div class="property-agent">
											  <h4 class="title-agent"><?php echo $User_info['Name'];?></h4>
											  <p class="color-text-a">
											  ImmoMaroc fournit un support en ligne à l’utilisateur pour vendre et acheter sa propriété. Lorsqu’un utilisateur souhaite acheter ou prendre la location, il nous contactera. Nous fournirons la meilleure propriété avec le temps de minimum .<br>
											  N'hésitez pas à nous contacter.
											  </p>
											  <ul class="list-unstyled">
												<li class="d-flex justify-content-between">
												  <strong>Mobile:</strong>
												  <span class="color-text-a"><?php echo $User_info['contact_no'];?></span>
												</li>
												<li class="d-flex justify-content-between">
												  <strong>Email:</strong>
												  <span class="color-text-a"><?php echo $User_info['email'];?></span>
												</li>
												<li class="d-flex justify-content-between">
												  <strong>Address:</strong>
												  <span class="color-text-a"><?php echo $User_info['Address'];?></span>
												</li>
											  </ul>
											</div>
										  </div>
										  <div class="col-md-12 col-lg-4">
											<div class="property-contact">
											  <form class="form-a" method="POST">
												<?php echo $msg;?>
												<div class="row">
												  <div class="col-md-12 mb-1">
													<div class="form-group">
													  <input type="text" class="form-control form-control-lg form-control-a" name="name" value="<?php echo $result['Name'];?>" value="<?php echo $name;?>" readonly>
													</div>
												  </div>
												  <div class="col-md-12 mb-1">
													<div class="form-group">
													  <input type="email" class="form-control form-control-lg form-control-a" name="email" value="<?php echo $result['email'];?>" readonly>
													</div>
												  </div>
												  <div class="col-md-12 mb-1">
													<div class="form-group">
													  <input type="text" class="form-control form-control-lg form-control-a" name="contact_no" value="<?php echo $result['contact_no'];?>" readonly>
													</div>
												  </div>
												  <div class="col-md-12 mb-1">
													<div class="form-group">
													  <textarea id="textMessage" class="form-control" placeholder="Message *" minlength="3" rows="3" name="message" required><?php echo $message;?></textarea>
													</div>
												  </div>
												  <div class="col-md-12">
													<button type="submit" name="send" class="btn btn-primary">Envoyer message</button>
												  </div>
												</div>
											  </form>
											</div>
										  </div>
										</div>
									 </div>
									 
							</div>
								<div class="card-footer">
									 
								</div>
						</div>
					</div>  
				</section>   				
			</div>
			<?php
				include_once 'include/footer.php';
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
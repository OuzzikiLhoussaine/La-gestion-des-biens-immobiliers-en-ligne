<?php
	$p_title ="LAND DETAILS";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$id=$_GET['l_id'];
	$query="SELECT * FROM `lands` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$result=mysqli_fetch_array($run);
	
	$u_id = $result['u_id'];
	$query1="SELECT * FROM `Users` WHERE `id`='$u_id'";
	$run1=mysqli_query($con,$query1);
	$User_info=mysqli_fetch_array($run1);
	
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
		elseif (empty($cnic_no)) 
	 	{
	 		$msg12="<div class='error'> Enter Your CNIC / Form-B Number </div>";	
	 	}
		elseif (!is_numeric($cnic_no)) 
	 	{
	 		$msg13="<div class='error'>Only Digit are Allowed </div>";	
	 	}
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
                        <h3 class="text-center"> informations personnelles</h3>
                    </div>
                </div>
				<section class="content">
					<div class="container-fluid">
						<div class="card card-primary">
							<div class="card-header"> informations personnelles </div>
							<div class="card-body">
								 <div class="row">
								  <div class="col-sm-12">
									<div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
									  <div class="carousel-item-b">
										<img src="admin/property images/<?php echo $result['pic']; ?>" height="500" alt="Property Image">
									  </div>
									  <div class="carousel-item-b">
										<img src="admin/property images/<?php echo $result['pic2']; ?>" height="500" alt="Property Image 2">
									  </div>
									</div>
									<div class="row justify-content-between">
									  <div class="col-md-5 col-lg-4">
										<div class="property-price d-flex justify-content-center foo">
										  <div class="card-header-c d-flex">
											<div class="card-box-ico">
											  <span class="ion-money">Rs</span>
											</div>
											<div class="card-title-c align-self-center">
											  <h5 class="title-c"><?php echo $result['price'];?></h5>
											</div>
										  </div>
										</div>
										<div class="property-summary">
										  <div class="row">
											<div class="col-sm-12">
											  <div class="title-box-d section-t4">
												<h3 class="title-d">résumé rapide</h3>
											  </div>
											</div>
										  </div>
										  <div class="summary-list">
											<ul class="list">
											  <li class="d-flex justify-content-between">
												<strong>ID :</strong>
												<span><?php echo $result['id'];?></span>
											  </li>
											  <li class="d-flex justify-content-between">
												<strong>Localisation:</strong>
												<span><?php echo $result['location'];?></span>
											  </li>
											  <li class="d-flex justify-content-between">
												<strong>Type de l'Annonce :</strong>
												<span>VILLA</span>
											  </li>
											  <li class="d-flex justify-content-between">
												<strong>Status:</strong>
												<span><?php echo $result['status'];?></span>
											  </li>
											  <li class="d-flex justify-content-between">
												<strong>Surface:</strong>
												<span><?php echo $result['area'];?>
												  <!-- <sup>marla</sup> -->
												</span>
											  </li>
											</ul>
										  </div>
										</div>
									  </div>
									  <div class="col-md-7 col-lg-7 section-md-t3">
										<div class="row">
										  <div class="col-sm-12">
											<div class="title-box-d">
											  <h3 class="title-d">Description</h3>
											</div>
										  </div>
										</div>
										<div class="property-description">
										  <p class="description color-text-a">
											<?php echo $result['discription'];?>
										  </p>
										</div>
										<div class="row section-t3">
										  <div class="col-sm-12">
											<div class="title-box-d">
											  <h3 class="title-d">Localisation</h3>
											</div>
										  </div>
										</div>
										<div class="amenities-list color-text-a">
											<?php $loc=$result['location']; ?>
											<iframe width="700" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $loc;?>&amp;sspn=33.984987,77.607422&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo $loc;?>&amp;z=12&amp;output=embed"></iframe>
										</div>
									  </div>
									</div>
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
										<img src="admin/user images/<?php echo $User_info['image']; ?>" alt="OWNER Image" class="img-fluid">
									  </div>
									  <div class="col-md-6 col-lg-4">
										<div class="property-agent">
										  <h4 class="title-agent"><?php echo $User_info['Name'];?></h4>
										  <p class="color-text-a">
										  ImmoMaroc fournit un support en ligne à l’utilisateur pour vendre et acheter sa propriété. Lorsqu’un utilisateur souhaite acheter ou prendre la location, il nous contactera. Nous fournirons la meilleure propriété avec le temps de mininium.<br>
										  N’hésitez pas à nous contacter.
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
											  <strong>Localisation:</strong>
											  <span class="color-text-a"><?php echo $User_info['Address'];?></span>
											</li>
										  </ul>
										  <div class="socials-a">
											<ul class="list-inline">
											  <li class="list-inline-item">
												<a href="#">
												  <i class="fa fa-facebook" aria-hidden="true"></i>
												</a>
											  </li>
											  <li class="list-inline-item">
												<a href="#">
												  <i class="fa fa-twitter" aria-hidden="true"></i>
												</a>
											  </li>
											  <li class="list-inline-item">
												<a href="#">
												  <i class="fa fa-instagram" aria-hidden="true"></i>
												</a>
											  </li>
											  <li class="list-inline-item">
												<a href="#">
												  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
												</a>
											  </li>
											  <li class="list-inline-item">
												<a href="#">
												  <i class="fa fa-dribbble" aria-hidden="true"></i>
												</a>
											  </li>
											</ul>
										  </div>
										</div>
									  </div>
									  <div class="col-md-12 col-lg-4">
										<div class="property-contact">
										  <form class="form-a" method="POST">
											<?php echo $msg;?>
											<div class="row">
											  <div class="col-md-12 mb-1">
												<div class="form-group">
												  <input type="text" class="form-control form-control-lg form-control-a" minlength="3" name="name" placeholder="Name *" value="<?php echo $name;?>" autocomplete="off" required>
												</div>
											  </div>
											  <div class="col-md-12 mb-1">
												<div class="form-group">
												  <input type="email" class="form-control form-control-lg form-control-a" name="email" placeholder="Email *" value="<?php echo $email;?>" required>
												</div>
											  </div>
											  <div class="col-md-12 mb-1">
												<div class="form-group">
												  <input type="text" class="form-control form-control-lg form-control-a" minlength="11" maxlength="11" name="contact_no" placeholder="Phone Number *" value="<?php echo $contact_no;?>" required>
												</div>
											  </div>
											  <div class="col-md-12 mb-1">
												<div class="form-group">
												  <textarea id="textMessage" class="form-control" placeholder="Message *" minlength="3" rows="3" name="message" required><?php echo $message;?></textarea>
												</div>
											  </div>
											  <div class="col-md-12">
												<button type="submit" name="send" class="btn btn-a">Envoyer message</button>
											  </div>
											</div>
										  </form>
										</div>
									  </div>
									</div>
								  </div>
								</div>

							</div>
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
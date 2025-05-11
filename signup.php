<?php 
	$Page_title='SignUp Page';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3='';
    $name=$email=$contact_no=$cnic_no=$address=$fname='';
    include ('include/dbconn.php');
    include ('include/functions.php');

    if(isset($_POST['submit']))
    {
        $name               = $_REQUEST['name'];
        $fname              = $_REQUEST['fname'];
        $email              = $_REQUEST['email'];
        $password           = $_REQUEST['password'];
        $confirm_password   = $_REQUEST['cpassword'];
        $contact_no         = $_REQUEST['contactno'];
        $cnic_no            = $_REQUEST['cnicno'];
		$image 				= $_FILES['image']['name'];
		$image_tmp_name		= $_FILES['image']['tmp_name'];
        $address            = $_REQUEST['address'];
		$user_status = 1;
		
		if (empty($name)) 
	 	{
	 		$msg01="<div class='error'> Entrer le Nom de Votre père </div>";	
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
	 		$msg14="<div class='error'> This E-Mail Already Exists. </div>";	
	 	}
		elseif (empty($password)) 
	 	{
	 		$msg15="<div class='error'> Enter Your Password </div>";	
	 	}
		elseif (strlen($password) < 3 AND strlen($password) > 21) 
	 	{
	 		$msg15="<div class='error'>Password Length must be between 4 and 20.  </div>";	
	 	}
        elseif($password != $confirm_password)
        {
            $msg15="<div class='error'>Password Does Not Matched </div>";
        }
		elseif (empty($image)) 
	 	{
	 		$msg16="<div class='error'> Please Your Select Image </div>";	
	 	}
        else
        {
            $sql = "INSERT INTO `users`(`Name`, `F_name`, `Address`, `cnic_no`, `contact_no`, `user_status`, `email`, `password`,`image`) VALUES ('$name','$fname','$address','$cnic_no','$contact_no','$user_status','$email','$password','$image')";
            //print_r($sql);
            $data = mysqli_query($con, $sql);
			move_uploaded_file($image_tmp_name, "admin/user images/$image");
            if($data = true)
            {
                $msg="<div class='sucess' align='center'> Record are Successfully Added. </div>";
				/*if($msg)
				{
					header("Refresh: 0; url=signup.php");*/
					$name=''; $email=''; $contact_no='';$cnic_no='';$address='';$fname='';
				//}					
            }
            else
            {
                $msg="<div class='error'>*** Something is Wrong IN INSERT Query! </div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> <?php echo $Page_title; ?> </title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/logo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style type="text/css">
	body
	{
		margin: 0px;
		padding: 0px;
		font-family:Verdana,Geneva,sen-serif;
		font-size: 15px;
	}
	.sucess
	{ 
		background-color: white;
		color: green;
	}
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
<body style="background-color: lightblue; margin-top: 10px;">
	<?php 
		//include_once 'include/searchbar.php';
		include_once 'include/header.php';
	?>

	<main id="main">
		<div class="login-area login-bg">
        <div class="container">			
            <div class="login-box ptb--100">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="login-form-head">
						<strong><?php echo $msg; ?></strong>
                        <h4>INSCRIPTION</h4>
                        <p>Bonjour, inscris-toi et rejoins-nous</p>
                    </div>
                    <div class="login-form-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Nom</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="name" minlength="3" maxlength="55" value="<?php echo $name;?>" placeholder="Entrer votre Nome..." class="form-control" required />
								<?php echo $msg01;?>
							</div>
						</div>
						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">P/Nom</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="fname" minlength="3" maxlength="55" value="<?php echo $fname;?>" placeholder="Entrer nom de votre père ..." class="form-control" required />
								<?php echo $msg11;?>
							</div>
						</div>
						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Mobile</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="contactno" minlength="11" maxlength="13" onkeyup="stopcursor(this)" value="<?php echo $contact_no;?>" placeholder="Entrer votre Mobile Number..." class="form-control" required />
								<?php echo $msg12;?>
							</div>
						</div>
						
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Email</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $email;?>" placeholder="Entrer Email..." class="form-control" required />
							</div>
							<?php echo $msg14; ?>
						</div>

						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">CNIE</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" name="cnicno" minlength="13" maxlength="15" onkeyup="stopcursor(this)" value="<?php echo $cnic_no;?>" placeholder="Enter CNIE Number..." class="form-control" required />
								<?php echo $msg13; ?>
							</div>
						</div>


						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Mot de passe</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="password" name="password" minlength="4" maxlength="20" placeholder="Enter Password..." class="form-control" required />
							</div>
						</div>
						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Retaper le mot de passe</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="password" name="cpassword" placeholder="Confirmer le mot de passe..." class="form-control" required />
								<?php echo $msg15; ?>
							</div>
						</div>
						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Image</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="file" name="image" class="form-control" required />
								<?php echo $msg16; ?>
							</div>
						</div>
						<div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Address</label>
							</div>
							<div class="col-12 col-md-9">
								<textarea name="address" minlength="3" placeholder="Address..." class="form-control" required /><?php echo$address;?></textarea>
							</div>
						</div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="submit">Submit <i class="fa fa-arrow-right"></i></button>
                        </div>
						<!--<div class="submit-btn-area">
                            <button id="form_reset" type="reset"> Reset <i class="fa fa-rotate-left"></i></button>
                        </div>-->
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Vous avez un compte ? ? <a href="signin.php"> CONNIXION</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
	</main>
  <footer>
    <div class="hcontainer">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-b"><img src="images/logo.png" width="50" height="50" alt="LOGO"> ImmoMaroc</span> All Rights Reserved.
            </p>
          </div>
          
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
  
  <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
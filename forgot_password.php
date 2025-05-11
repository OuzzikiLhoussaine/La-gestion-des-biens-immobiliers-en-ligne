<?php 
	$Page_title='Forgot Password';
	include('include/dbconn.php');
    include('include/functions.php');

	// This function is used for checking the father name is the email has already registered or not
	function f_name_exists($F_name,$con)
	{
		$row=mysqli_query($con, "SELECT `F_name` FROM `users` WHERE `F_name`='$F_name' ");
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

	$msg=$msg1=$msg2=$msg3=$msg4='';$msg5='';
	$email=''; $pass=''; $cpass='';$fn='';
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$cpassword=$_POST['cpass'];
    $fname=$_POST['fn'];

		
		if(empty($email))
		{
			$msg2="<div class='error'>  Email is required. </div>";
		}
		elseif(!email_exists($email,$con))
		{
			$msg2="<div class='error'>  This  Email Does NOT Exists. </div>";
		}

    elseif(empty($fname))
		{
			$msg5="<div class='error'>  father name is required. </div>";
		}
		elseif(!f_name_exists($fname,$con))
		{
			$msg5="<div class='error'>This  father name  Does NOT Exists. </div>";
		}
    elseif(empty($password))
		{
			$msg1="<div class='error'> Password is required. </div>";
		}
		elseif (strlen($password)<3 AND strlen($password)>21) 
		{
			$msg1="<div class='error'> Password must between 4 and 20. </div>";
		}
		elseif ($password!=$cpassword) 
	 	{
	 		$msg3="<div class='error'> Your Passwords Are Not Matched. </div>";	
	 	}
     
		else
	 	{
	 		//$msg1="<div class='error'>*** This Email  Exists. </div>";
			$qry="UPDATE `users` SET `password`='$password' WHERE email='$email'";
			$result=mysqli_query($con,$qry);
			if($result == true)
			{  
				$msg="<script> alert(' Your Password is Changed Successfully'); </script>";
				//if($msg)
				//header("Refresh: 0; url=login.php");
				$email=''; $password=''; $cpassword='';
			}
			else
			{
				$msg="<div class='error'> Something is Wrong in UPDATE Query! </div>";
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
	.error
	{ 
		color: red;
	}

</style>
  
</head>
<body style="background-color: lightblue; margin-top: 10px;">
	<?php 
		include_once 'include/searchbar.php';
		include_once 'include/header.php';
	?>

	<main id="main">
		<div class="login-area" style="background-color: lightblue;">
        <div class="container">
            <div class="login-box ptb--100">
				<form method="POST">
                    <div class="login-form-head">
                        <h4>RÉINITIALISER LE MOT DE PASSE</h4>
                        
                    </div>
                    <div class="login-form-body">
						<?php echo $msg;?>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="<?php echo $email;?>" id="exampleInputEmail1" required />
                            <i class="fa fa-envelope"></i>
                            <div class="text-danger"></div>
							<?php echo $msg2;?>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Nom de votre père </label>
                            <input type="text" name="fn" value="<?php echo $fn;?>" id="exampleInputEmail1" required />
                            <i class="fa fa-envelope"></i>
                            <div class="text-danger"></div>
							<?php echo $msg5;?>
                        </div>
						<div class="form-gp">
                            <label for="exampleInputPassword1">Nouveau Password</label>
                            <input type="password" name="pass" id="exampleInputPassword1" required />
                            <i class="fa fa-lock"></i>
                            <div class="text-danger"></div>
							<?php echo $msg1;?>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirmer Password</label>
                            <input type="password" name="cpass" id="exampleInputPassword2" required />
                            <i class="fa fa-lock"></i>
							<?php echo $msg3;?>
                        </div>
                        <div class="submit-btn-area mt-5">
                            <button id="form_submit" type="submit" name="submit">Réinitialiser<i class="ti-arrow-right"></i></button>
                        </div>
						<div class="form-footer text-center mt-5">
                            <p class="text-muted"> Pour vous connecter, appuyez sur? <a href="signin.php">CONNEXION</a></p>
                        </div>
                    </div>
                </form>
			</div>
        </div>
    </div>

	<main>
  <footer>
    <div class="container">
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
<?php 
	$Page_title=' SignIn';
	include("include/dbconn.php");

    $msg=$msg1=$msg2=''; $email='';
    if(isset($_POST['submit']))
    {
      $email=$_REQUEST['email'];
      $password=$_REQUEST['pass'];
      //echo $username." ". $password;
		
		if(empty($email))
		{
			$msg1="<div class='error'>***Email is required. </div>";
		}
		elseif(empty($password))
		{
			$msg2="<div class='error'>***Password is required. </div>";
		}
		else
		{
			$query="SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' AND `user_status`='1'";
			$result=mysqli_query($con,$query);
		   //print_r($result);
			$row=mysqli_num_rows($result);   
			if ($row < 1) 
			{
				$msg="<div class='error' style='text-align:center;'>Incoorect UserName/password. </div>";
			}
			else
			{
				$data=mysqli_fetch_assoc($result);
				$user_id=$data['id']; 
				session_start();
				$_SESSION['user_id']=$user_id; 
				header("location:user/user_dashboard.php");
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
						<img src="images/logo.png" width="100" height="100" >
                        <h4 >CONNEXION</h4>
                        <!--<p>Hello there, Sign in and start managing your Account</p>-->
                    </div>
					<?php echo $msg;?>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" value="<?php echo $email;?>" id="exampleInputEmail1" required />
                            <i class="fa fa-envelope"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" name="pass" id="exampleInputPassword1" required />
                            <i class="fa fa-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Se souvenir de moi.</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="forgot_password.php">Mot de passe oublié?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="submit" >Submit <i class="ti-arrow-right"></i></button>
                            
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Vous n’avez pas de compte ? <a href="signup.php">Sign up</a></p>
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
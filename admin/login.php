<?php 
	$Page_title='Admin Login';
	include_once '../include/head.php';
	
?>
<style type="text/css">
	body{
			margin: 0px;
			padding: 0px;
			font-family:Verdana,Geneva,sen-serif;
			font-size: 15px;
		}
  .loginpic
   {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	position: absolute;
	top: -50px;
	left: calc(50% - 50px);
   }
	.error
	{ 
		color: red;
	}

</style>

</head>
<body>
	<?php 
		include_once '../include/searchbar.php';
		include_once '../include/header.php';
	?>

 <main id="main">

	<div class="container" style="margin-top: 170px;">
		<div class="login-form col-md-4 offset-md-4 ">
			<div class="jumbotron" style="background-color: lightblue; margin-top: 30%; padding-top: 50px; padding-bottom: 30px;"> 
				<img src="../images/logo.png" class="loginpic">
				<h3 align="center"> Admin Login </h3> <br/>
				<form method="POST">
					<div class="form-group">
						<label> Email / User Name: </label>
						<input type="email" name="uname" placeholder=" User Name" class="form-control" />
					</div>
					<div class="form-group">
						<label> Password: </label>
						<input type="password" name="pass" placeholder=" your Password" class="form-control" />
					</div>
					<div class="form-group">
						<input type="checkbox" name="check" /> &nbsp; Keep me Login
					</div>
					<div class="form-group">
					<center> <input type="submit" name="submit" value="Login" class="btn btn-lg btn-success"> </center>
				</div>
				<ul type="circle">
					<li><center><a href="#"> Forgot Password? </a> </center>  </li>
				</ul>
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
              <span class="color-b"><img src="../images/logo.png" width="50" height="50" alt="LOGO">Immo Maroc</span> All Rights Reserved.
            </p>
          </div>
          
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>
</html>
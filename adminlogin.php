<?php 
	$Page_title='Admin Login Page';
	include_once 'include/head.php';
	include("include/dbconn.php");

    $msg=''; $username='';
    if(isset($_POST['submit']))
    {
      $username=$_REQUEST['username'];
      $password=$_REQUEST['password'];
      //echo $username." ". $password;

      $query="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
      $result=mysqli_query($con,$query);
       //print_r($result);
      $row=mysqli_num_rows($result);   
      if ($row < 1) 
      {
        $msg="<div class='error'>Incoorect UserName/password. </div>";
      }
      else
      {
        $data=mysqli_fetch_assoc($result);
        $admin_id=$data['id']; 
        session_start();
        $_SESSION['admin_id']=$admin_id; 
        header("location:admin/dashboard.php");
      }
    }
?>
<style type="text/css">
	body
	{
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
		include_once 'include/searchbar.php';
		include_once 'include/header.php';
	?>

 <main id="main">

	<div class="container" style="margin-top: 170px;">
		<div class="login-form col-md-4 offset-md-4 ">
			<div class="jumbotron" style="background-color: lightblue; margin-top: 30%; padding-top: 50px; padding-bottom: 30px;"> 
				<img src="images/logo.png" style="background-color: gray;" class="loginpic">
				<h3 align="center"> Connexion administrateur </h3> <br/>
				<form method="POST">
					<div class="form-group">
						<label>  Nom d'utilisateur: </label>
						<input type="text" name="username" value="<?php echo $username; ?>" placeholder=" Nom d'utilisateur:" class="form-control" required />
					</div>
					<div class="form-group">
						<label> Mot de passe: </label>
						<input type="password" name="password" placeholder=" Mot de passe " class="form-control" required />
						<span id="error_password" class="text-danger" style="font-size: 14px; font-weight:bold;"> <?php echo $msg; ?></span>
					</div>
					<div class="form-group">
						<input type="checkbox" name="check" /> &nbsp; Souviens-toi de moi
					</div>
					<div class="form-group">
					<center> <input type="submit" name="submit" value="Login" class="btn btn-md btn-success"> </center>
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
              <span class="color-b"><img src="images/logo.png" width="50" height="50" alt="LOGO">ImmoMaroc</span> All Rights Reserved.
            </p>
          </div>
          
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
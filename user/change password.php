<?php
	$p_title ="Change Password";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3='';
	
	if(isset($_POST['update']))
    {
        $password           = $_REQUEST['password'];
		$id					= $result['id'];
		
		
		if (empty($password)) 
	 	{
	 		$msg15="<div class='error'> Enter Your Password </div>";	
	 	}
		elseif (strlen($password) < 3 AND strlen($password) > 21) 
	 	{
	 		$msg15="<div class='error'>Password Length must be between 4 and 20.  </div>";	
	 	}
        else
        {
            $sql = "UPDATE `users` SET `password`='$password' WHERE `id`='$id'";
            $data = mysqli_query($con, $sql);
            if($data = true)
            {
                $msg = "<script> alert('SuccessFully Updated'); </script>";
				if($msg)
				header("Refresh: 0; url=change password.php");				
            }
            else
            {
                $msg="<div class='error'>*** Something is Wrong IN Query! </div>";
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
                        <h3 class="text-center"> Informations d'identification personnelles</h3>
                    </div>
                </div>
				<section class="content">
					<div class="container-fluid">
						<div class="card card-primary">
							<div class="card-header"> Informations sur le mot de passe </div>
							<div class="card-body">
								<form method="POST">
									<div class="row">
										<div class="form-group col-sm-6">
										  <label> Mot de passe </label>
										  <input type="text" name="password" minlength="4" maxlength="20" class="form-control" value="<?php echo $result['password']; ?>" required />
										  <?php echo $msg15;?>
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
<?php
	$p_title ="FLAT DETAILS";
	include_once 'include/session.php';
	include_once 'include/head.php';
	
	$id=$_GET['l_id'];
	$query="SELECT * FROM `lands` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$result1=mysqli_fetch_array($run);
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3='';
    $area=$price=$status=$location=$discription='';
	include ('include/dbconn.php');
    include ('include/functions.php');
	if(isset($_POST['update']))
    {
        $area               = $_REQUEST['area'];
        $price              = $_REQUEST['price'];
		$status 			= $_REQUEST['status'];
		$pic 				= $_FILES['pic']['name'];
		$pic_tmp_name		= $_FILES['pic']['tmp_name'];
		$pic2 				= $_FILES['pic2']['name'];
		$pic2_tmp_name		= $_FILES['pic2']['tmp_name'];
		$location 			= $_REQUEST['location'];
		$discription		= $_REQUEST['discription'];
		
		if (empty($area)) 
	 	{
	 		$msg01="<div class='error'> Enter Total Area of Your Property</div>";	
	 	}
		elseif (!is_numeric($area)) 
	 	{
	 		$msg01="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif ($area < 0) 
	 	{
	 		$msg01="<div class='error'> ***Should contain Positive value </div>";	
	 	}
		elseif (empty($price)) 
	 	{
	 		$msg11="<div class='error'> Enter Total Price of Your Property</div>";	
	 	}
		elseif (!is_numeric($price)) 
	 	{
	 		$msg11="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif ($price < 0) 
	 	{
	 		$msg01="<div class='error'> ***Should contain Positive value </div>";	
	 	}
		elseif (empty($location)) 
	 	{
	 		$msg16="<div class='error'> Enter Location Of Your Property </div>";	
	 	}
		elseif (strlen($location) < 2) 
	 	{
	 		$msg16="<div class='error'>Should contain Atleast 3 Letters  </div>";	
	 	}
        else
        {
            $sql = "UPDATE `flats` SET `area`='$area',`price`='$price',`status`='$status',`pic`='$pic',`pic2`='$pic2',`location`='$location',`discription`='$discription' WHERE `id`='$id'";
            $data = mysqli_query($con, $sql);
			move_uploaded_file($pic_tmp_name, "property images/$pic");
			move_uploaded_file($pic2_tmp_name, "property images/$pic2");
            if($data = true)
            {
                $msg="<script> alert('Les enregistrements sont mis à jour avec succès');</script>";
				if($msg)
				{
					header("Refresh: 0; url=update_flat.php?f_id=".$id);
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
							<h1 class="m-0 text-dark">Annonce Details</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="Flats.php"> Villa </a></li>
							  <li class="breadcrumb-item active"> Details de Villa </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> Immobilier Information </div>
							<div class="card-body">
							<?php echo $msg; ?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Surface </label>
											<input type="text" name="area" maxlength="7" value="<?php echo $result1['area'];?>" placeholder="Total Area of House/Land(in Marlas)..." class="form-control" required />
											<?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Prix</label>
											<input type="text" name="price" maxlength="11" onkeyup="stopcursor(this)" value="<?php echo $result1['price'];?>" placeholder="Whole Price..." class="form-control" />
											<?php echo $msg11; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Status </label>
											<select name="status" class="custom-select" value="<?php echo $result1['status'];?>" required >
												<?php
													if($result1['status']=='VENTE')
													{
														echo("<option value='VENTE'>VENTE</option>");
														echo ("<option value='LOCATION'>LOCATION</option>");
													}
													elseif($result1['status']=='RENT')
													{
														echo("<option value='VENTE'>VENTE</option>");
														echo "<option value='LOCATION' selected='selected'>LOCATION</option>";													}
													else
													{
														echo("<option value='VENTE'>VENTE</option>");
														echo "<option value='LOCATION'>LOCATION</option>";													}
													?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-6">
													<label> Image1 </label>
													<input type="file" name="pic" class="form-control" required />
												</div>
												<div class="form-group col-sm-6">
													<img src="property images/<?php echo $result1['pic']; ?>" width="200" height="100" style="float: right; border-radius: 10px;">
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="row">
												<div class="form-group col-sm-6">
													<label> Image2 </label>
													<input type="file" name="pic2" class="form-control" required />
												</div>
												<div class="form-group col-sm-6">
													<img src="property images/<?php echo $result1['pic2']; ?>" width="200" height="100" style="float: right; border-radius: 10px;">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Location </label>
											<textarea name="location" minlength="3" class="form-control" required /><?php echo $result1['location'];?></textarea>
											<?php echo $msg16; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Discription </label>
											<textarea name="discription" minlength="3" class="form-control" required /><?php echo $result1['discription'];?></textarea>
											<?php echo $msg16; ?>
										</div>
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="update" class="btn btn-primary col-sm-3"><i class="fa fa-share" style="color: green;"></i> mise à jour </button>
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
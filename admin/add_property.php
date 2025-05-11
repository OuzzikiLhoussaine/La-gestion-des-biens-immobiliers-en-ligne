<?php
	$p_title ="ADD Property";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3='';
    $area=$property_type=$price=$rooms=$bathrooms=$garage=$status=$location=$kitchan='';
	include ('include/dbconn.php');
    include ('include/functions.php');
	if(isset($_POST['add']))
    {
        $area               = $_REQUEST['area'];
        $property_type      = $_REQUEST['property_type'];
        $price              = $_REQUEST['price'];
        $rooms           	= $_REQUEST['rooms'];
        $bathrooms         	= $_REQUEST['bathrooms'];
        $garage             = $_REQUEST['garage'];
        $kitchan            = $_REQUEST['kitchan'];
        $year	            = $_REQUEST['year'];
		$status 			= $_REQUEST['status'];
		$pic 				= $_FILES['pic']['name'];
		$pic_tmp_name		= $_FILES['pic']['tmp_name'];
		$pic2 				= $_FILES['pic2']['name'];
		$pic2_tmp_name		= $_FILES['pic2']['tmp_name'];
		$location 			= $_REQUEST['location'];
		
		if (empty($area)) 
	 	{
	 		$msg01="<div class='error'> Enter Total Area of Your Property</div>";	
	 	}
		elseif (!is_numeric($area)) 
	 	{
	 		$msg01="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (empty($price)) 
	 	{
	 		$msg11="<div class='error'> Enter Total Price of Your Property</div>";	
	 	}
		elseif (!is_numeric($price)) 
	 	{
	 		$msg11="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (!is_numeric($rooms)) 
	 	{
	 		$msg12="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (!is_numeric($bathrooms)) 
	 	{
	 		$msg13="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (!is_numeric($garage)) 
	 	{
	 		$msg14="<div class='error'>Only Digit are Allowed </div>";	
	 	}
		elseif (!is_numeric($kitchan)) 
	 	{
	 		$msg15="<div class='error'>Only Digit are Allowed </div>";	
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
            $sql = "INSERT INTO `properties`(`location`, `property_type`, `area`, `price`, `rooms`, `bathrooms`, `garage`, `kitchan`, `year`, `status`, `pic`, `pic2`) VALUES ('$location','$property_type','$area','$price','$rooms','$bathrooms','$garage','$kitchan','$year','$status','$pic','$pic2')";
            $data = mysqli_query($con, $sql);
			move_uploaded_file($pic_tmp_name, "property images/$pic");
			move_uploaded_file($pic2_tmp_name, "property images/$pic2");
            if($data = true)
            {
                $msg="<script> alert('Record are Successfully Added');</script>";
				if($msg)
				{
					header("Refresh: 0; url=add_property.php");
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
							<h1 class="m-0 text-dark">Property Details</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="Properties.php"> Property </a></li>
							  <li class="breadcrumb-item active">ADD Property </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> Property Information </div>
							<div class="card-body">
							<?php echo $msg; ?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Area </label>
											<input type="text" name="area" maxlength="7" value="<?php echo $area;?>" placeholder="Total Area of House/Land(in Marlas)..." class="form-control" required />
											<?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Property-Type</label>
											<select name="property_type" class="form-control" required >
												<option value='' selected hidden> Select Property Type</option>
												<option value='HOUSE'>HOUSE</option>
												<option value='LAND'>LAND</option>
												<option value='HOSTEL'>HOSTEL</option>
												<option value='SCHOOL'>SCHOOL</option>
												<option value='OTHER'>OTHER</option>
											</select>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Prix</label>
											<input type="text" name="price" maxlength="11" onkeyup="stopcursor(this)" value="<?php echo $price;?>" placeholder="Whole Price..." class="form-control" />
											<?php echo $msg11; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Rooms</label>
											<input type="text" name="rooms" maxlength="4" onkeyup="stopcursor(this)" value="<?php echo $rooms;?>" placeholder="Total Rooms, If No Than enter 0..." class="form-control" required />
										<?php echo $msg12;?>
										</div>	
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Bathrooms </label>
											<input type="text" name="bathrooms" value="<?php echo $bathrooms;?>" placeholder="Total Bathrooms, If No Than enter 0" maxlength="4" class="form-control" required />
											<?php echo $msg13; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Garage </label>
											<input type="text" name="garage" maxlength="4" value="<?php echo $garage;?>" placeholder="Total Garages, If No Than enter 0..." class="form-control" required />
											<?php echo $msg14; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Kitchan </label>
											<input type="text" name="kitchan" maxlength="4" value="<?php echo $kitchan;?>" placeholder="Total Kitchan, If No Than enter 0..." class="form-control" required />
											<?php echo $msg15; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Status </label>
											<select name="status" class="form-control" required >
												<option value='' selected ='selected'  hidden> Select Status</option>
												<option value='SALE'>VENTE</option>
												<option value='RENT'>LOCATION</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Image1 </label>
											<input type="file" name="pic" class="form-control" required />
										</div>
										<div class="form-group col-sm-6">
											<label> Image2 </label>
											<input type="file" name="pic2" class="form-control" required />
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Year </label>
											<input type="date" name="year" class="form-control" required />
										</div>
										<div class="form-group col-sm-6">
											<label> Location </label>
											<textarea name="location" minlength="3" class="form-control" required /><?php echo $location;?></textarea>
											<?php echo $msg16; ?>
										</div>
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="add" class="btn btn-primary col-sm-3"><i class="fa fa-share" style="color: green;"></i> ADD </button>
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
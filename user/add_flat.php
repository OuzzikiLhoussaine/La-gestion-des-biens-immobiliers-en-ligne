<?php
	$p_title ="Add Flat";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$msg=$msg1=$msg01=$msg11=$msg12=$msg13=$msg14=$msg15=$msg16=$msg2=$msg3=$msg00='';
    $area=$price=$status=$location=$discription=$rooms=$bathrooms=$garage=$kitchan='';
	include ('include/dbconn.php');
    include ('../admin/include/functions.php');
	if(isset($_POST['add']))
    {
        $area               = $_REQUEST['area'];
        $price              = $_REQUEST['price'];
        // $rooms              = $_REQUEST['rooms'];
        // $bathrooms          = $_REQUEST['bathrooms'];
        // $garage             = $_REQUEST['garage'];
        // $kitchan            = $_REQUEST['kitchan'];
		$status 			= $_REQUEST['status'];
		$pic 				= $_FILES['pic']['name'];
		$pic_tmp_name		= $_FILES['pic']['tmp_name'];
		$pic4 				= $_FILES['pic4']['name'];
		$pic2				= $_FILES['pic2']['name'];
		$pic3 				= $_FILES['pic3']['name'];
		$pic5 				= $_FILES['pic5']['name'];
		$pic6 				= $_FILES['pic6']['name'];
		$pic3_tmp_name		= $_FILES['pic3']['tmp_name'];
		$pic4_tmp_name		= $_FILES['pic4']['tmp_name'];
		$pic5_tmp_name		= $_FILES['pic5']['tmp_name'];
		$pic6_tmp_name		= $_FILES['pic6']['tmp_name'];
		$pic2_tmp_name		= $_FILES['pic2']['tmp_name'];
		$location 			= $_REQUEST['location'];
		$discription		= $_REQUEST['discription'];
		$date 				= date('d-m-y h:ia');
		$u_id				= $result['id'];
	    $maxsize  = 104857600;
		$name = $_FILES['file']['name'];
		$target_dir = "admin/property video/";
		$target_file = $target_dir . $_FILES['file']['name'];
		$videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("mp4","ogg","avi","3gp","mov","mpeg","mp4v");
		if(in_array($videoFileType, $extensions_arr)){
			if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]['size'] == 0)){
             $msg00 ="<div class='error'> file too large . file must be less than 5MB.</div>";
			}
		}
		if (empty($area)) 
	 	{
	 		$msg01="<div class='error'> Enter Total Area of Your Property</div>";	
	 	}
		//elseif (!is_numeric($area)) {
	 		//$msg01="<div class='error'>Only Digit are Allowed </div>";	
	 	//}
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
	 		$msg11="<div class='error'> ***Should contain Positive value </div>";	
	 	}
		// elseif (!is_numeric($rooms)) 
	 	// {
	 	// 	$msg12="<div class='error'>Only Digit are Allowed </div>";	
	 	// }
		// elseif ($rooms < 0) 
	 	// {
	 	// 	$msg12="<div class='error'> ***Should contain Positive value </div>";	
	 	// }
		// elseif (!is_numeric($bathrooms)) 
	 	// {
	 	// 	$msg13="<div class='error'>Only Digit are Allowed </div>";	
	 	// }
		// elseif ($bathrooms < 0) 
	 	// {
	 	// 	$msg13="<div class='error'> ***Should contain Positive value </div>";	
	 	// }
		// elseif (!is_numeric($garage)) 
	 	// {
	 	// 	$msg14="<div class='error'>Only Digit are Allowed </div>";	
	 	// }
		// elseif ($garage < 0) 
	 	// {
	 	// 	$msg14="<div class='error'> ***Should contain Positive value </div>";	
	 	// }
		// elseif (!is_numeric($kitchan)) 
	 	// {
	 	// 	$msg15="<div class='error'>Only Digit are Allowed </div>";	
	 	// }
		// elseif ($kitchan < 0) 
	 	// {
	 	// 	$msg15="<div class='error'> ***Should contain Positive value </div>";	
	 	// }
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
            $sql = "INSERT INTO `flats`(`area`, `price`, `status`, `pic`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `location`, `discription`, `Date`, `rooms`, `bathrooms`, `garage`, `kitchan`, `u_id`) VALUES ('$area','$price','$status','$pic','$pic2','$pic3','$pic4','$pic5','$pic6','$location','$discription','$date','$rooms','$bathrooms','$garage','$kitchan','$u_id')";
			$data = mysqli_query($con, $sql);
			move_uploaded_file($pic_tmp_name, "../admin/property images/$pic");
			move_uploaded_file($pic2_tmp_name, "../admin/property images/$pic2");
			move_uploaded_file($pic3_tmp_name, "../admin/property images/$pic3");
			move_uploaded_file($pic4_tmp_name, "../admin/property images/$pic4");
			move_uploaded_file($pic5_tmp_name, "../admin/property images/$pic5");
			// move_uploaded_file($pic6_tmp_name, "../admin/property images/$pic6");
			
            if($data = true)
            {
                $msg="<script> alert('Record are Successfully Added');</script>";
				if($msg)
				{
					header("Refresh: 0; url=add_flat.php");
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
							<h1 class="m-0 text-dark">Détails de l'annonce</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item"><a href="Flats.php"> Villas </a></li>
							  <li class="breadcrumb-item active">Ajouter une villa </li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header bg-primary"> Informations d'Appartement </div>
							<div class="card-body">
							<?php echo $msg; ?>
								<form method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Serface </label>
											<input type="text" name="area" maxlength="7" value="<?php echo $area;?>" placeholder="Serface..." class="form-control" required />
											<?php echo $msg01;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Prix</label>
											<input type="text" name="price" maxlength="11" onkeyup="stopcursor(this)" value="<?php echo $price;?>" placeholder="Prix..." class="form-control" />
											<?php echo $msg11; ?>
										</div>
									</div>
									<!-- <div class="row">
										<div class="form-group col-sm-6">
											<label> Rooms</label>
											<input type="text" name="rooms" maxlength="4" onkeyup="stopcursor(this)" value="<?php echo $rooms;?>" placeholder="Total Rooms, If No Than enter 0..." class="form-control" required />
										<?php echo $msg12;?>
										</div>
										<div class="form-group col-sm-6">
											<label> Bathrooms </label>
											<input type="text" name="bathrooms" value="<?php echo $bathrooms;?>" placeholder="Total Bathrooms, If No Than enter 0" maxlength="4" class="form-control" required />
											<?php echo $msg13; ?>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Garage </label>
											<input type="text" name="garage" maxlength="4" value="<?php echo $garage;?>" placeholder="Total Garages, If No Than enter 0..." class="form-control" required />
											<?php echo $msg14; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Kitchan </label>
											<input type="text" name="kitchan" maxlength="4" value="<?php echo $kitchan;?>" placeholder="Total Kitchan, If No Than enter 0..." class="form-control" required />
											<?php echo $msg15; ?>
										</div>
									</div> -->
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Statut </label>
											<select name="status" class="custom-select" required >
												<option value='' selected ='selected'  hidden> sélectionner le statut</option>
												<option value='VENTE'>VENTE</option>
												<option value='LOCATION'>LOCATION</option>
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
										<div class="form-group col-sm-6">
											<label> Image3 </label>
											<input type="file" name="pic3" class="form-control" required />
										</div>
										<div class="form-group col-sm-6">
											<label> Image4 </label>
											<input type="file" name="pic4" class="form-control" required />
										</div>
										<div class="form-group col-sm-6">
											<label> Image5 </label>
											<input type="file" name="pic5" class="form-control" required />
										</div>
										<!-- <div class="form-group col-sm-6">
											<label> Video </label>
											<input type="file" name="pic6" class="form-control" required />
										</div> -->
										<!--<div class="form-group col-sm-6">
											<label> video (max 2 min) </label>
											<input type="file" name="video" value="upload" class="form-control" required />
										</div>-->
									</div>
									<div class="row">
										<div class="form-group col-sm-6">
											<label> Localisation </label>
											<textarea name="location" minlength="3" class="form-control" required /><?php echo $location;?></textarea>
											<?php echo $msg16; ?>
										</div>
										<div class="form-group col-sm-6">
											<label> Description </label>
											<textarea name="discription" minlength="3" class="form-control" required /><?php echo $discription;?></textarea>
											<?php echo $msg16; ?>
										</div>
									</div>
							</div>
								<div class="card-footer">
									  <button type="submit" name="add" class="btn btn-primary col-sm-3"><i class="fa fa-share" style="color: green;"></i> Ajouter </button>
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
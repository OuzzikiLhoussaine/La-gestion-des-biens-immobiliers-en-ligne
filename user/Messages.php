<?php
	$p_title ="Messages";
	include_once ('include/session.php');
	include_once 'include/head.php';
	
	$u_id = $result['id'];
	$qry="SELECT * FROM `lands` WHERE `id`='$u_id'";
	$run=mysqli_query($con,$qry);
	$land_result=mysqli_fetch_array($run);
	$l_id = $land_result['id'];
	
	$qry1="SELECT * FROM `flats` WHERE `id`='$u_id'";
	$run1=mysqli_query($con,$qry1);
	$flat_result=mysqli_fetch_array($run1);
	$f_id = $flat_result['id'];
	
?>

    <link rel="stylesheet" type="text/css" href="assets/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/datatables/css/fixedHeader.bootstrap4.css">
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
							<h1 class="m-0 text-dark"> Tous les messages</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item active">Messages</li>
							</ol>
						  </div><!-- /.col -->
						</div><!-- /.row -->
					  </div><!-- /.container-fluid -->
					</div>
					<!-- /.content-header -->
				
				<div class="row">
					<!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0"> Messages</h3>
                                <p> Tous les messages qui sont envoyés par l’utilisateur.</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Contact Number</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$query="SELECT * FROM `comments` WHERE `id`='$l_id' OR `id`='$f_id'";
												$run=mysqli_query($con,$query);
												if(mysqli_num_rows($run)<1)
												{
													echo " <tr> <td colspan='6'> No Record Found  </td> </tr>";
												}
												else
												{
													$count=0;
													while($data = mysqli_fetch_assoc($run))
													{
														$count++;
											?>
														<tr>
															<td> <?php echo $count; ?> </td>
															<td> <?php echo $data['Name']; ?> </td>
															<td> <?php echo $data['email']; ?> </td>
															<td> <?php echo $data['contact_no']; ?> </td>
															<td> <?php echo $data['comments']; ?> </td>
															<td>
															  <a href="delete_message.php?m_id=<?php echo $data['id'];?>" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span>  </a>
															</td>
														</tr>
											<?php 
													}
												}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
				</div>
				
			</div>
			<?php
		
			?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
     <!-- Optional JavaScript -->
    <!-- Optional JavaScript -->
    <?php include_once 'include/js.php'; ?>
</body>
 
</html>
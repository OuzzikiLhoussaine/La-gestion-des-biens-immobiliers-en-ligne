<?php
	$p_title ="Agents";
	include_once ('include/session.php');
	include_once 'include/head.php';
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
							<h1 class="m-0 text-dark">Agents Information</h1>
						  </div><!-- /.col -->
						  <div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							  <li class="breadcrumb-item"><a href="dashboard.php">Accueil</a></li>
							  <li class="breadcrumb-item active">Agents </li>
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
                                <h3 class="mb-0"> Users Informations</h3>
                                <p> All the Users which are Registered are displayed in the following Table.</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th><a href="add_agent.php" class="btn btn-xs btn-success editbtn"><span class="fa fa-plus"></span></a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$query="SELECT * FROM `agents`";
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
															<td> <?php echo $data['Mobile_no']; ?> </td>
															<td> <?php echo $data['email']; ?> </td>
															<td> <?php echo $data['Address']; ?> </td>
															<td>
															  <a href="delete_agent.php?a_id=<?php echo $data['id'];?>" class="btn btn-xs btn-danger"><span class="fa fa-trash"></span>  </a>
															  <a href="update_agent.php?a_id=<?php echo $data['id'];?>" class="btn btn-xs btn-success editbtn"><span class="fa fa-edit"></span>  </a>
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
                                                <th>Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Action</th>
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
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/datatables/js/dataTables.buttons.min.js"></script>
    <script src="assets/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/datatables/js/data-table.js"></script>
    <script src="assets/datatables/js/jszip.min.js"></script>
    <script src="assets/datatables/js/pdfmake.min.js"></script>
    <script src="assets/datatables/js/vfs_fonts.js"></script>
    <script src="assets/datatables/js/buttons.html5.min.js"></script>
    <script src="assets/datatables/js/buttons.print.min.js"></script>
    <script src="assets/datatables/js/buttons.colVis.min.js"></script>
    <script src="assets/datatables/js/dataTables.rowGroup.min.js"></script>
    <script src="assets/datatables/js/dataTables.select.min.js"></script>
    <script src="assets/datatables/js/dataTables.fixedHeader.min.js"></script>
</body>
 
</html>
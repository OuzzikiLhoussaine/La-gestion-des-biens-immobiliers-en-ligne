<?php
	$p_title ="Dashboard";
	include_once ('include/session.php');
	include_once 'include/head.php';
?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php
			include_once 'include/header.php';
			include_once 'include/sidebar.php';
			
			$users_data = mysqli_query($con, "SELECT * FROM `users`");
			$total_users= mysqli_num_rows($users_data);  // fetching number of users
			
			$properties_data = mysqli_query($con, "SELECT * FROM `properties`");
			$total_properties= mysqli_num_rows($properties_data);  // fetching number of Properties
			
			$messages_data = mysqli_query($con, "SELECT * FROM `messages`");
			$total_messages= mysqli_num_rows($messages_data);  // fetching number of Agents
		?>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h3 class="text-center"> Tableau de bord administrateur</h3>
                    </div>
                </div>
				<div class="row">
                    <!-- metric -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Les utilisateurs</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"> <?php echo $total_users; ?>  </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success">
                                    <i class="fa fa-fw fa-caret-up"></i><span><?php echo $total_users; ?>%</span>
                                </div>
                            </div>
                            <div id="sparkline-1"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Annonces</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"> <?php echo $total_properties; ?> </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-danger">
                                    <i class="fa fa-fw fa-caret-down"></i><span><?php echo $total_properties; ?>%</span>
                                </div>
                            </div>
                            <div id="sparkline-2"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric -->
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Messages</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary"><?php echo $total_messages; ?></h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-danger">
                                    <i class="fa fa-fw fa-caret-down"></i><span><?php echo $total_messages; ?>%</span>
                                </div>
                            </div>
                            <div id="sparkline-3">
                            </div>
                        </div>
                    </div>
                    <!-- /. metric -->
                    <!-- metric 
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Growth</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1 text-primary">+28.45% </h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success">
                                    <i class="fa fa-fw fa-caret-up"></i><span>4.87%</span>
                                </div>
                            </div>
                            <div id="sparkline-4"></div>
                        </div>
                    </div>
                    <!-- /. metric -->
                </div>
            </div>
			<?php
			
			?>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
   <?php include_once 'include/js.php'; ?>
</body>
 
</html>
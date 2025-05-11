<?php 
	$Page_title='All FLATS';
	include_once 'include/head.php';
	include_once 'include/dbconn.php';
	
?>

</head>

<body>
	<?php 
		// include_once 'include/searchbar.php';
		include_once 'include/flat_header_searchbar.php';
	?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> Annonces</h1>
              <span class="color-text-a"> Tout APPARTEMENTS</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Tout APPARTEMENTS
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
			<div class="col-sm-12">
				<div class="grid-option">
				  <form>
					<select class="custom-select">
					  <option selected>TOUT</option>
					  <option value="1">New to Old</option>
					  <option value="2">à louer</option>
					  <option value="3">à vendre</option>
					</select>
				  </form>
				</div>
			</div>
			<?php
				$query="SELECT * FROM `flats`";
				$run=mysqli_query($con,$query);
				if(mysqli_num_rows($run)<1)
				{
					echo " <h> No Record Found  </h>";
				}
				else
				{
					while($data = mysqli_fetch_assoc($run))
					{
			?>
			
					<div class="col-md-4">
						<div class="card-box-a card-shadow">
						  <div class="img-box-a">
							<img src="admin/property images/<?php echo $data['pic']; ?>" alt="Property Image"  height="300px" class="img-a img-fluid">
						  </div>
						  <div class="card-overlay">
							<div class="card-overlay-a-content">
							  <div class="card-header-a">
								<h2 class="card-title-a">
								  <a  href="single flat.php?f_id=<?php echo $data['id'];?>"> APPARTEMENT
									<h6> <?php echo $data['location'];?></a>
								</h6>
							  </div>
							  <div class="card-body-a">
								<div class="price-box d-flex">
								  <span class="price-a"> MAD <?php echo $data['price'];?></span>
								</div>
								<a href="single flat.php?f_id=<?php echo $data['id'];?>" class="link-a">Cliquez ici pour afficher
								  <span class="ion-ios-arrow-forward"></span>
								</a>
							  </div>
							  <div class="card-footer-a">
								<ul class="card-info d-flex justify-content-around">
								  <li>
									<h4 class="card-info-title">Surface</h4>
									<span><?php echo $data['area'];?>
									  <sup>m</sup>
									</span>
								  </li>
								</ul>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
			<?php 
					}
				}
			?>
        </div>
       
      </div>
    </section>

  </main>
<?php include_once "include/footer.php"; ?>
</body>

</html>
<?php 
	$Page_title='All Properties';
	include_once 'include/head.php';
	include_once 'include/dbconn.php';
	
	$id=$_GET['p_id'];
	$query="SELECT * FROM `properties` WHERE `id`='$id'";
	$run=mysqli_query($con,$query);
	$result=mysqli_fetch_array($run);
	
	if(isset($_POST['submit']))
    {
        $name       = $_REQUEST['name'];
        $email      = $_REQUEST['email'];
        $message    = $_REQUEST['message'];
		
		if (empty($name)) 
	 	{
	 		$msg01="<div class='error'> Enter Total Area of Your Property</div>";	
	 	}
		elseif (!is_numeric($area)) 
	 	{
	 		$msg01="<div class='error'>Only Digit are Allowed </div>";	
	 	}
	}
?>

</head>

<body>
	<?php 
		include_once 'include/searchbar.php';
		include_once 'include/header.php';
	?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?php echo $result['property_type'];?></h1>
              <span class="color-text-a"><?php echo $result['location'];?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Accueil</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="allproperty.php">Annonces</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?php echo $result['property_type'];?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <div class="carousel-item-b">
                <img src="admin/property images/<?php echo $result['pic']; ?>" height="500" alt="Property Image">
              </div>
              <div class="carousel-item-b">
                <img src="admin/property images/<?php echo $result['pic2']; ?>" height="500" alt="Property Image 2">
              </div>
            </div>
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">MAD</span>
                    </div>
                    <div class="card-title-c align-self-center">
                      <h5 class="title-c"><?php echo $result['price'];?></h5>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">résumé rapide</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Annonce ID:</strong>
                        <span><?php echo $result['id'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Localisation:</strong>
                        <span><?php echo $result['location'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Type de L'annonce:</strong>
                        <span><?php echo $result['property_type'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status:</strong>
                        <span><?php echo $result['status'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Surface :</strong>
                        <span><?php echo $result['area'];?>
                          <sup>marla</sup>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Description d'annonce</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                  ImmoMaroc fournit les meilleures qualités aux clients. Notre objectif est de fournir des solutions efficaces aux clients avec des spécifications maximum. Fournis le soutien 24/7 pour le client.
                  </p>
                  <p class="description color-text-a no-margin">
                  Il offre un soutien aux clients en proposant des tarifs bas et élevés.
                  </p>
                </div>
                <!-- <div class="row section-t3">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Amenities</h3>
                    </div>
                  </div>
                </div>
                <div class="amenities-list color-text-a">
                  <ul class="list-a no-margin">
                    <li>Balcony</li>
                    <li>Outdoor Kitchen</li>
                    <li>Cable Tv</li>
                    <li>Deck</li>
                    <li>Tennis Courts</li>
                    <li>Internet</li>
                    <li>Parking</li>
                    <li>Sun Room</li>
                    <li>Concrete Flooring</li>
                  </ul>
                </div>
              </div>
            </div>
          </div> -->
          <!--<div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>-->
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">contacter l'agent</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <img src="images/YASIR.jpg" alt="Agent Image" class="img-fluid">
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent">OUZZIKI LHOUSSAINE</h4>
                  <p class="color-text-a">
                  ImmoMaroc fournit un support en ligne à l'utilisateur pour vendre et acheter sa propriété. Lorsqu’un utilisateur souhaite acheter ou prendre la location, il nous contactera. Nous fournirons la meilleure propriété avec le temps de mininium                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a">+212 651 382 345</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a">ouzziki.lhoussaine@gmail.com</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Localisation:</strong>
                      <span class="color-text-a">Ouarzazate.</span>
                    </li>
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a" method="POST">
                    <div class="row">
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Nom *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-a">Envoyer le message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  <?php include_once "include/footer.php";?>
</body>

</html>
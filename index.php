<?php 

$Page_title = 'Home';
include_once 'include/dbconn.php'; // <--- MUST come first
include_once 'include/head.php';
?>



<body>
	<?php 
		
		include_once 'include/header.php';
	?>
  <!-- ======= Intro Section ======= -->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-1.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          
        </div>
      </div>
      <div class="carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          
        </div>
      </div>
    </div>
  </div>

  <main id="main">

    
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Dernier Annonce</h2>
              </div>
              <div class="title-link">
                <a href="all lands.php">Tout les Annonces
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
		<?php

            $qry= "SELECT * FROM `lands` ORDER BY 4 DESC LIMIT 0, 6";
            
            $run= mysqli_query($con, $qry);
            
			      if(mysqli_num_rows($run)<1 )
			      {
				       echo " <h> No Record Found  </h>";
			      }
			       else
			      { 
			       	while($data = mysqli_fetch_assoc($run))
				    {
        ?>
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="admin/property images/<?php echo $data['pic']; ?>" alt="Property Image"  height="300px" >
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="single land.php?l_id=<?php echo $data['id'];?>">IMMOBILIER
                        <h6> <?php echo $data['location'];?></a> </h6>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php echo $data['status'];?> | MAD.<?php echo $data['price'];?></span>
                    </div>
                    <a href="single land.php?l_id=<?php echo $data['id'];?>" class="link-a">Cliquez ici pour afficher
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Surface </h4>
                        <span><?php echo $data['area'];?>
                          m<sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Prix</h4>
                        <span><?php echo $data['price'];?></span>
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
	
    
    <section class="section-agents section-t8">
      <div class="container">
        
                <div class="card-footer-d">
                  <div class="socials-footer d-flex justify-content-center">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        
	</div>
  </main>
  

<?php
	include_once "include/footer.php";
?>
</body>

</html>

<!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php"> <img src="images/logo.png" width="60" height="60" alt="LOGO"> Immo <span class="color-b">Maroc</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Accueil</a>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Annonces
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="all lands.php">Villas</a>
              <a class="dropdown-item" href="all flats.php">Appartements</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Compte
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="signup.php">SignUp</a>
              <a class="dropdown-item" href="signin.php">SignIn</a>
              <a class="dropdown-item" href="adminlogin.php">Admin Login</a>
            </div>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
    </div>
  </nav><!-- End Header/Navbar -->
  
  
  
  
  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Rechercher une annonce </h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="POST" action="search flats.php">
        <div class="row">
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select name="type" class="form-control form-control-lg form-control-a" id="Type">
                <option value='LOCATION'>LOCATION</option>
				<option value='VENTE'>VENTE</option>
              </select>
            </div>
          </div>
		  <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="area">Surface</label>
              <input type="text" name="area" class="form-control form-control-lg form-control-a" placeholder="Surface" id="area">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">Localisation</label>
              <input type="text" name="location" class="form-control form-control-lg form-control-a" placeholder="Locatisaion" id="city">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Min Prix</label>
              <input type="text" name="price" class="form-control form-control-lg form-control-a" placeholder="Minimium Prix" id="price">
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" name="search" class="btn btn-b">Rechercher une annonce </button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->
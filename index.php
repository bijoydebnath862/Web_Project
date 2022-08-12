<!DOCTYPE html>
<html>
<head>
	<title>Bijoy Travels</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: whitesmoke;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Bijoy Travels</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
					role="button" data-toggle="dropdown">User Login</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="Ulogin.php">Guest</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="trgrp/TGlogin.php">Tour Group</a>
						</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
					role="button" data-toggle="dropdown">Register</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="Usignup.php">Guest</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="trgrp/TGsignup.php">Tour Group</a>
						</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact info</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slideshow/12.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slideshow/19.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slideshow/21.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


	
</body>
</html>
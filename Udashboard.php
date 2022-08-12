<?php
	session_start();
	function get_user_issue_booking_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$user_issue_booking_count = 0;
		$query = "select count(*) as user_issue_booking_count from issued_bookings where guest_id = $_SESSION[id]";
		$query_run = mysqli_query($connection,$query);
		while($row = mysqli_fetch_assoc($query_run)){
			$user_issue_booking_count = $row['user_issue_booking_count'];
	}
	return($user_issue_booking_count);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
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
		<style>
body {
  background-image: url('slideshow/16.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: cover;
}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="Udashboard.php">Bijoy Travels</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="Uview_profile.php">View Profile</a>
						<a class="dropdown-item" href="Uedit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="Uchange_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="Udashboard.php" class="nav-link">Dashboard</a>
			</li>
			<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Packages</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="manage_package.php">View All Packages</a>
						<a class="dropdown-item" href="search_package.php"> Search Packages</a>
					</div>
				</li>
		
		</ul>
	</div>
</nav>
<br><br>
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Issued Bookings:</div>
				<div class="card-body">
					<p class="card-text">No. of Issued Bookings: <?php echo get_user_issue_booking_count();?> </p>
					<a href="view_issued_booking.php" class="btn btn-danger">View Issued Bookings</a>
				</div>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
</body>
</html>
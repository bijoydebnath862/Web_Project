<?php
	require('functions.php');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
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
				<a class="navbar-brand" href="admin_dashboard.php">Bijoy Travels</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="admin_dashboard.php" class="nav-link">Dashboard</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Packages</a>
				<div class="dropdown-menu">
					<a href="add_package.php" class="dropdown-item">Add New package</a>
					<a href="manage_package.php" class="dropdown-item">Manage packages</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown">Tour Group</a>
				<div class="dropdown-menu">
					<a href="add_tg.php" class="dropdown-item">Add New Tour Group</a>
					<a href="manage_tg.php" class="dropdown-item">Manage Tour Groups</a>
				</div>
			</li>
			<li class="nav-item">
				<a href="issue_booking.php" class="nav-link">Issue Booking</a>
			</li>
		</ul>
	</div>
</nav><br><br>

	
	<div class="row">
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Users:</div>
				<div class="card-body">
					<p class="card-text">No. of total users: <?php echo get_user_count();?></p>
					<a href="regusers.php" class="btn btn-danger">View Registered Users</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Packages:</div>
				<div class="card-body">
					<p class="card-text">No. of availbale Packages:<?php echo get_package_count();?> </p>
					<a href="regpackage.php" class="btn btn-primary">View Packages</a>
				</div>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Registered Tour Group:</div>
				<div class="card-body">
					<p class="card-text">No. of availbale Tour Groups: <?php echo get_tg_count();?></p>
					<a href="regtg.php" class="btn btn-info">View Tour Group</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card bg-light" style="width: 300px">
				<div class="card-header">Issued Bookings:</div>
				<div class="card-body">
					<p class="card-text">No. Issued Bookings: <?php echo get_issued_booking_count();?></p>
					<a href="view_issued_booking.php" class="btn btn-success">View Issued bookings</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
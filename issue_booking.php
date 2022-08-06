<?php
	session_start();
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
	$package_name = "";
	$tg_id = "";
	$query = "select package_name , name  from packages left join trgrp on packages.tg_id = trgrp.id where package_id = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$package_name = $row['package_name'];
		$tg = $row['name'];
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
		</ul>
	</div>
</nav>

	<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post">
				<div class="form-group">
					<label>Package Name:</label>
					<input type="text" name="package" class="form-control" value = "<?php echo $package_name;?>" required="">
				</div>
				<div class="form-group">
					<label>Tour Group:</label>
					<input type="text" name="tg_name" class="form-control" value = "<?php echo $tg;?>" required="">
				</div>
				<div class="form-group">
					<label>User ID:</label>
					<input type="text" name="user_id" class="form-control" value = "<?php echo $_SESSION['id'];?>" required="">
				</div>
				<div class="form-group">
					<label>No Of Tavellers:</label>
					<input type="number" name="no_users" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Issue Date:</label>
					<input type="date" name="issue_date" class="form-control" required="">
				</div>	
				<button class="btn btn-primary" name="issue_booking">Issue Booking</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['issue_booking'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$query = "insert into issued_bookings values(null,'$_POST[package]','$_POST[tg_name]',$_POST[user_id],$_POST[no_users],'$_POST[issue_date]')";
		$query_run = mysqli_query($connection,$query);
	}
?>
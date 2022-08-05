<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tour Group Dashboard</title>
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
				<a class="navbar-brand" href="TG_dashboard.php">Bijoy Travels</a>
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
				<a href="TG_dashboard.php" class="nav-link">Dashboard</a>
			</li>
		</ul>
	</div>
</nav>

	<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-8">
				<?php
				$connection = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($connection, "tour");
				$tg_id=$_SESSION['id'];
				$query = "select * from packages where tg_id=$tg_id";
				$query_run = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					$package_image = $row['package_image'];
					$description = $row['description'];
				?>
					<div class="card d-flex p-2" style="width: 30rem; margin: 20px;">
						<img class="card-img-top" src="../images/<?php echo $package_image; ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo $row['package_name']; ?></h5>
							<p>tour group id: <?php echo $row['tg_id']; ?></p>
							<p>package price: : <?php echo $row['package_price']; ?></p>
							<p class="card-text"><?php echo $description; ?></p>
							<a href="edit_package.php?bn=<?php echo $row['package_id']; ?>" class="btn btn-primary">Edit</a>
							<a href="delete_package.php?bn=<?php echo $row['package_id']; ?>" class="btn btn-primary">Delete</a>
						</div>
					</div>
				<?php
				}
				?>

		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>
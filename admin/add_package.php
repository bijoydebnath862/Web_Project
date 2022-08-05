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
		#side_bar {
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
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
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

			</ul>
		</div>
	</nav>

	<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Package Name:</label>
					<input type="text" name="package_name" class="form-control" required="">
				</div>
				<div class="form-group">
					<label>Tour Group:</label>
					<input type="text" name="tg" class="form-control" required="">
				</div>

				<div class="form-group">
					<label>package Price:</label>
					<input type="text" name="package_price" class="form-control" required="">
				</div>

				<div class="form-group">
					<label>Image</label>
					<input type="file" name="package_image" id="package_image" class="form-control">
				</div>

				<div class="form-group">
					<label>Description</label>
					<textarea rows="3" cols="40" class="form-control" name="description"></textarea>
				</div>

				<button class="btn btn-primary" name="add_package">Add package</button>

			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>

</html>

<?php
if (isset($_POST['add_package'])) {

	$package_name = $_POST['package_name'];
	$tg = $_POST['tg'];
	$package_price = $_POST['package_price'];
	$description = $_POST['description'];
	$img_name = $_FILES['package_image']['name'];
  
	//echo $img_name;
	//Extracting image extension
	$image_extension = pathinfo($img_name, PATHINFO_EXTENSION);
	//changing the image name unique
	$package_image = 'image_' . date("mjYHis") . '.' . $image_extension;
	//moving the image into folder
	move_uploaded_file($_FILES['package_image']['tmp_name'], '../images/' . $package_image);
  
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "tour");
	// $query = "insert into packages values(null,'$_POST[package_name]','$_POST[tg]',$_POST[package_price],'$package_image')";
  
	$query = "INSERT INTO packages (package_name, tg_id, package_price, package_image, description) 
	VALUES ('$package_name', '$tg', '$package_price', '$package_image','$description');";
  
  
	$query_run = mysqli_query($connection, $query);
  }
?>
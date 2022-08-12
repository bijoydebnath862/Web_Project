<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<title>Bijoy Travels</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style>
body {
  background-image: url('../slideshow/9.jpg');
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
				<a class="navbar-brand" href="../index.php">Bijoy Travels</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">User Login</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../Ulogin.php">Guest</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="TGlogin.php">Tour Group</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Register</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../Usignup.php">Guest</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="TGsignup.php">Tour Group</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../contact.php">Contact info</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<br><br>
	<?php
			

			if (isset($_SESSION['status'])) {
			?>

				<div class="alert alert-success" role="alert" id="popup-alert" style="display: block;">

					<div class="alert-items" style="display: flex;justify-content: space-between;">
						<div class="popup-message">
							<?php echo $_SESSION['status']; ?>
						</div>

						<div class="close-button">
							<button class="close-button" onclick="myFunction()">x</button>
						</div>

					</div>


				</div>


			<?php
				unset($_SESSION['status']);
			}
			?>
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-8" id="main_content">
			
			<center>
				<h3>Tour Group Login Form</h3>
			</center>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary"> Login</button>
			</form>

			<?php
			if (isset($_POST['login'])) {
				$connection = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($connection, "tour");
				$query = "select * from trgrp where email = '$_POST[email]'";
				$query_run = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if ($row['email'] == $_POST['email']) {
						if ($row['password'] == $_POST['password']) {
							if ($row['verify_status'] == 1) {
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id'];
								header("Location:TG_dashboard.php");
							} else {
								$_SESSION['status'] = "Please verify your email";
								echo "<script> window.location.href='TGlogin.php'; </script>";
							}
						} else {
			?>
							<br><br>
							<center><span class="alert-danger">Wrong Password</span></center>
			<?php
						}
					}
				}
			}
			?>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
<script>
	function myFunction() {
		var x = document.getElementById("popup-alert");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>

</html>
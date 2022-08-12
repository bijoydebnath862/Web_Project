<?php
require('functions.php');
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "tour");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" />
	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		#side_bar {
			background-color: whitesmoke;
			padding: 50px;
			width: 300px;
			height: 450px;
		}
		i{
			color: black;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard">Bijoy Travels</a>
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
		<div class="col-md-4"></div>
		<div class="col-md-4">

			<?php if (!isset($_POST['search'])) { ?>
				<form action="" method="post">
					<div class="form-group">
						<label>Tour Group:</label>
						<div class="d-flex">
							<select class="form-control" name="tg">
								<option>-Select Tour Group-</option>
								<?php
								$query = "select name,id from trgrp";
								$query_run = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($query_run)) {
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php
								}
								?>
							</select>
							<div class="form control">
								<button class="btn btn-info" name="search" class="p-0 m-0 footer-action-icons" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
									<i class="fa-solid fa-arrows-rotate"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Package Name :</label>
						<select class="form-control">

							<option>-Select Package name-</option>
						</select>
					</div>


				</form>
			<?php } elseif (isset($_POST['search'])) {
				$optionvalue = $_POST['tg'];

			?>
				<form action="" method="post">
					<div class="form-group">
						<label>Tour Group:</label>
						<div class="d-flex">
							<select class="form-control" name="tgn">
								<option>-Select Tour Group-</option>
								<?php
								$query = "select name,id from trgrp";
								$query_run = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($query_run)) {
									if ($row['id'] == $optionvalue) $selected = 'selected="true"';
									else $selected = '';
									$rowname = $row['name'];
									$rowid = $row['id'];
									echo "<option $selected value='$rowid'>$rowname</option>";
								?>
								<?php
								}
								?>
							</select>
							<div class="form control">
								<button class="btn btn-info" name="search" class="p-0 m-0" style="background-color: transparent;background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none;">
									<i class="fa-solid fa-arrows-rotate"></i>
								</button>
							</div>
						</div>

					</div>
					<!-- </form>



				<form action="" method="post"> -->
					<div class="form-group">
						<label>Package Name :</label>

						<select class="form-control" name="pkval">
							<option>-Select Package name-</option>
							<?php
							$query_package = "select package_name from packages where tg_id=$optionvalue;";
							$query_package_run = mysqli_query($connection, $query_package);
							while ($rows = mysqli_fetch_assoc($query_package_run)) {
								$rowp = $rows['package_name'];
								echo "<option value='$rowp'>$rowp</option>";
							?>
							<?php
							}
							?>
						</select>
					</div>
				<?php

			}
				?>

				<div class="form-group">
					<label>User ID:</label>
					<select class="form-control" name="user_id">
						<option>-Select User ID-</option>
						<?php
						$query_guest = "select id from guest";
						$query_guest_run = mysqli_query($connection, $query_guest);
						while ($rowuid = mysqli_fetch_assoc($query_guest_run)) {
						?>
							<option value="<?php echo $rowuid['id']; ?>"><?php echo $rowuid['id']; ?></option>
						<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label>No Of Tavellers:</label>
					<input type="text" name="no_users" class="form-control" required="">
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

<?php
if (isset($_POST['issue_booking'])) {
	$opn = $_POST['tgn'];
	$query_tgname = "select name from trgrp where id=$opn;";
	$query_tgname_run = mysqli_query($connection, $query_tgname);
	$result = mysqli_fetch_assoc($query_tgname_run);
	$tgname = $result['name'];


	$pkv = $_POST['pkval'];
	$uid = $_POST['user_id'];
	$nou = $_POST['no_users'];
	$isd = $_POST['issue_date'];
	$query_up = "insert into issued_bookings values(null,'$pkv','$tgname',$uid,$nou,'$isd');";
	$query_up_run = mysqli_query($connection, $query_up);
	// unset($_POST['search']);

	if ($query_up_run) {
		$_SESSION['status'] = "Packages uploaded";
		echo "<script> window.location.href='issue_booking.php'; </script>";
	}
}
?>
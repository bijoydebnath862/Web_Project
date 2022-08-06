<?php
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "tour");
$tg = $_SESSION['name'];
$package_name = "";
$user = "";
$umail = "";
$mobile = "";
$address = "";
$status = "";
$issue_date = "";
$query = "select * from issued_bookings left join guest on issued_bookings.guest_id=guest.id  where tg = '$tg'";
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
				<a class="navbar-brand" href="TG_dashboard.php">Bijoy Travels</a>
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
					<a href="TG_dashboard.php" class="nav-link">Dashboard</a>
				</li>
			</ul>
		</div>
	</nav>
	<br><br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form>
				<table class="table-bordered" width="900px" style="text-align: center">
					<tr>
						<th>Package Name:</th>
						<th>User Name:</th>
						<th>User Mail:</th>
						<th>User Mobile:</th>
						<th>User Address:</th>
						<th>No of Travellers:</th>
						<th>Issue Date:</th>
						<th> Action </th>
					</tr>
					<?php
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
						$package_name = $row['package_name'];
						$user = $row['name'];
						$umail = $row['email'];
						$mobile = $row['mobile'];
						$address = $row['address'];
						$status = $row['status'];
						$issue_date = $row['issue_date'];
					?>
						<tr>
							<td><?php echo $package_name; ?></td>
							<td><?php echo $user; ?></td>
							<td><?php echo $umail; ?></td>
							<td><?php echo $mobile; ?></td>
							<td><?php echo $address; ?></td>
							<td><?php echo $status; ?></td>
							<td><?php echo $issue_date; ?></td>
							<td>
								<button class="btn" name=""><a href="delete_bookings.php?bn=<?php echo $row['s_no']; ?>">Cancel Booking</a></button>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>

</body>

</html>
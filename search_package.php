<?php
	session_start();
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
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action = "" method="POST">
                <div class = "form-group">
                    <input type = "text" name = "package" class = "form-control" placeholder = "Search Packages" required>
                </div>
                <button type = "submit" name = "search_package" class = "btn btn-primary">Search</button>
            </form><br><br>
			<?php
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"tour");
					if(isset($_POST['search_package']))
					{
						$package = $_POST['package'];
						$query = "select * from packages left join trgrp on packages.tg_id=trgrp.id where CONCAT(package_name) like '$package%'";
						$query_run = mysqli_query($connection,$query);	
			?>
			<div class = "table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Tour Group Id</th>
						<th>Tour Group Name</th>
						<th>Price</th>
						<th>Action</th>
					
					</tr>
				</thead>
				<?php
					if(mysqli_num_rows($query_run) > 0)
					{
						while($row = mysqli_fetch_array($query_run))
						{
				?>
						<tr>
							<td><?php echo $row['package_name'];?></td>
							<td><?php echo $row['tg_id'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['package_price'];?></td>
							<td>
								<button class="btn" name=""><a href="issue_booking.php?bn=<?php echo $row['package_id'];?>">Book</a></button>
							
							</td>
						</tr>
						<?php
									}
								}
								else 
								{
									?>
									<tr> 
										<td colspan = "4"> No package  Found </td>
									</tr>
									<?php
								
								}
						?>
						
			</table>
			</div>
			<?php
			}
			?>
		</div>
		<div class="col-md-2"></div>
	</div>
</body>
</html>
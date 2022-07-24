<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
	$query = "delete from packages where package_id = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Package Deleted...");
	window.location.href = "manage_package.php";
</script>
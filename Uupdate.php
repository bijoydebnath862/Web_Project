<?php

	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
	$query = "update guest set name='$_POST[name]',email='$_POST[email]',mobile='$_POST[mobile]',address='$_POST[address]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "Udashboard.php";
</script>
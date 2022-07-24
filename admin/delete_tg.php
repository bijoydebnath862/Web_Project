<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
	$query = "delete from trgrp where id = $_GET[aid]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Tour Group Deleted...");
	window.location.href = "manage_tg.php";
</script>
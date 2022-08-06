<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"tour");
	$query = "delete from issued_bookings where s_no = $_GET[bn]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Booking Deleted...");
	window.location.href = "view_issued_booking.php";
</script>
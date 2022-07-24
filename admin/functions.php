<?php
	function get_user_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$user_count = "";
		$query = "select count(*) as user_count from guest";
		$query_run = mysqli_query($connection,$query);
		while($row = mysqli_fetch_assoc($query_run)){
			$user_count = $row['user_count'];
		}
		return($user_count);
	}

	function get_package_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$package_count = "";
		$query = "select count(*) as package_count from packages";
		$query_run = mysqli_query($connection,$query);
		while($row = mysqli_fetch_assoc($query_run)){
			$package_count = $row['package_count'];
		}
		return($package_count);
	}

	function get_tg_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$tg_count = "";
		$query = "select count(*) as tg_count from trgrp";
		$query_run = mysqli_query($connection,$query);
		while($row = mysqli_fetch_assoc($query_run)){
			$tg_count = $row['tg_count'];
		}
		return($tg_count);
	}

	function get_issued_booking_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"tour");
		$issued_booking_count = "";
		$query = "select count(*) as issued_booking_count from issued_bookings";
		$query_run = mysqli_query($connection,$query);
		while($row = mysqli_fetch_assoc($query_run)){
			$issued_booking_count = $row['issued_booking_count'];
		}
		return($issued_booking_count);
	}
?>
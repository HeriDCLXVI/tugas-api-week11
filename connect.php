<?php
	$server = "localhost"; //nama server
	$username = "root"; // username 
	$password = ""; //  standarnya kosong
	$database = "api-week-11"; // buat nama database harus sama 

	$auth_token = "123456";
	// Koneksi dan memilih database di server
	$link = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
	mysqli_select_db($link, $database) or die("Database tidak bisa dibuka");
?>
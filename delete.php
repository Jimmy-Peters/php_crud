<?php
	include('conn.php');
	$id = $_GET['q'];
	$query="delete from contacts where id= '$id';";
	if (mysqli_query($conn, $query)) {
		header("location: index.php");
	} else {
		echo 'Cannot Delete';

	}

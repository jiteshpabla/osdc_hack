<?php
function sql_query( $query )
	{
		//variables for sql operations
		$servername="";
$username="";
$password="";
$dbname="";
		include 'connection.php';
		$con = mysqli_connect($servername, $username, $password, $dbname);
		if (mysqli_connect_errno($con))
		{
			db_failure();
		}
		$result = mysqli_query($con,$query);
		//echo("Error description: " . mysqli_error($con));
		mysqli_close($con);
		return $result;
	}
?>
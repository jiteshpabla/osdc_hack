<?php
$servername = "localhost";
$username = "root";
$password = "utkarsh1996";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}

echo $_POST["p1"];
echo $_POST["p2"];
$email=$_POST["p1"];

$pass=$_POST["p2"];


$sql1 = "SELECT t2,t3 FROM users WHERE t2='$email' AND t3='$pass' ";
$result = $conn->query($sql1);
if($sql1=="")
	echo "invalid login";
else
{
		session_start();
		$_SESSION['sarty']=$email;
		header("location:afterlogin.php");
	
}

mysqli_close($conn);
?>
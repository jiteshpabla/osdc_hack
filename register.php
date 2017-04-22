<html>
<body>
<?php include'header.php';?>
<!-- banner -->

<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->
<?php
$t1Er=$t2Er=$t3Er=$t4Er=$t5Er=$t6Er=$t7Er="";
$t1=$t2=$t3=$t4=$t5="";
$name=$email=$pw=$c_pw=$address=$mob=$dob=$job=$exp="";

if(isset($_POST["submit"]))
{
$servername = "localhost";
$username = "root";
$password = "utkarsh1996";
$dbname = "osdchack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	function test_input($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

	if(empty($_POST["t1"]))
	{
		$t1Er = "Name is required";
	}
	else
	{
		$name=test_input($_POST['t1']);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
		{
         $t1Er = "Only letters and white space allowed"; 
        }
	}
if (empty($_POST["t2"])) {
    $t2Er = "Email is required";
  } else {
    $email = test_input($_POST["t2"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailEr = "Invalid email format"; 
    }
  }
  if(!empty($_POST["t3"]) && ($_POST["t3"] == $_POST["t4"])) 
  {
        $pw = test_input($_POST["t3"]);
        $c_pw = test_input($_POST["t4"]);
        if (strlen($_POST["t3"]) <= '8') {
            $t3Er = "Your Password Must Contain At Least 8 Characters!";
        }
    }
	else {
          $t3Er = "Please Check You've Entered Or Confirmed Your Password!";
       }

    $address=test_input($_POST['t5']); 
   if(!empty($_POST['t6']))
    $mob=test_input($_POST['t6']);
  if(!empty($_POST['t7']))
      $dob=test_input($_POST['t7']);
    if(!empty($_POST['t8']))
    $job=test_input($_POST['t8']); 
    if(!empty($_POST['t9']))
    $exp=test_input($_POST['t9']); //how to validate an address
}

if($t1Er=="" && $t2Er=="" && $t3Er=="" && $t4Er=="")
{
$sql = "INSERT INTO users VALUES ('$name', '$email' , '$pw' , '$c_pw' , '$address','$mob','$dob','$job','$exp')";
if ($conn->query($sql) === TRUE) {
    echo "done";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
}
?>

<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" id="t1" class="form-control" placeholder="Full Name" name="t1">
				<span>* <?php echo $t1Er;?></span>
                <input type="email" id="t2" class="form-control" placeholder="Enter Email" name="t2">
				<span>* <?php echo $t2Er;?></span>
                <input type="password" id="t3" class="form-control" placeholder="Password" name="t3">
				<span><?php echo $t3Er;?></span>

                <input type="password" id="t4" class="form-control" placeholder="Confirm Password" name="t4">
				<span><?php echo $t4Er;?></span>
                
        <input type="text" id="t5" class="form-control" placeholder="Address" name="t5" >
        <input type="text" id="t6" placeholder="Enter Mobile number" name="t6"></input>
        <input type="date" id="t7" placeholder="Date of Birth" name="t7"></input><br>
        <input type="text" id="t8" placeholder="You are Tutor/Student" name="t8"></input>
        <input type="text" id="t9" placeholder="If Teacher Enter your Expertise" name="t9"></input>
				<input type="submit" class="btn btn-success" name="submit">
</form>

                
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>

</body>
</html>
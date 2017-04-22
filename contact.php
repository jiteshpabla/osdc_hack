<html>
<body>
<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->

<?php

$fn=$ea=$cn=$mes="";

$fnEr=$eaEr=$cnEr=$mesEr="";

$name=$email=$contact=$message="";

if(isset($_POST["Submit"]))
{
$servername = "localhost";
$username = "root";
$password = "utkarsh1996";
$dbname = "dbms";

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

	if(empty($_POST["fn"]))
	{
		$fnEr = "Name is required";
	}
	else
	{
		$name=test_input($_POST["fn"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
		{
         $fnEr = "Only letters and white space allowed"; 
        }
	}
if (empty($_POST["ea"])) {
    $eaEr = "Email is required";
  } else {
    $email = test_input($_POST["ea"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $eaEr = "Invalid email format"; 
    }
  }
    $contact=test_input($_POST["cn"]);
    $message=test_input($_POST["mes"]);    //how to validate an address
}

if($fnEr=="" && $eaEr=="")
{
$sql = "INSERT INTO contact VALUES ('$name','$email','$contact','$message')";
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
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" class="form-control" placeholder="Full Name" name="fn">
				<span>* <?php echo $fnEr;?></span>
                <input type="text" class="form-control" placeholder="Email Address" name="ea">
				<span>* <?php echo $eaEr;?></span>
                <input type="text" class="form-control" placeholder="Contact Number" name="cn">
                <textarea rows="6" class="form-control" placeholder="Message" name="mes"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
</form>


                
        </div>
 <!-- <div class="col-lg-6 col-sm-6 ">
  <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDzX7IEHMh_QtplSkK-aJdo8vS8m606VNM'></script><div style='overflow:hidden;height:400px;width:520px;'><div id='gmap_canvas' style='height:400px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-generator.com/'>embedding google map</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=2cb8322b71b308226e594003333e9e3c9c470368'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(28.53328399787538,77.39296972960754),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(28.53328399787538,77.39296972960754)});infowindow = new google.maps.InfoWindow({content:'<strong>Jaypee Institute of Information Technology, Noida, Uttar Pradesh</strong><br><br>201309 Noida<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
  </div> -->
</div>
</div>
</div>

<?php include'footer.php';?>
</body>
</html>
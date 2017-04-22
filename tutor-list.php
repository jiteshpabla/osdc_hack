<?php include'header.php';?>
<?php session_start();?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / View tutors & students</span>
    <h2>View Tutors & Students</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">
<div class="hot-properties hidden-xs">
<h4>Tutors --> </h4>
<div id ="div1">

</div>



</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!--<div class="pull-left result">Showing: 12 of 100 </div>-->

</div>
<div class="row">

      <!-- properties -->
	  <?php
include 'connection.php';

		// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);


$q="Select * from users where t8='Tutor'";
$r = mysqli_query($conn,$q);
if($r|| mysqli_num_rows($r)){
	   
		while($row = mysqli_fetch_assoc($r))
		{
			$dbuname = $row['t1'];
			$dbnumber = $row['t6'];
			$dbfield = $row['t9'];
		
			
			
		
			echo ' <div class="col-lg-4 col-sm-6">
      <div class="properties">
       
        <h4>'.$dbuname.'</h4>
        <h6>'.$dbfield.'</h6>
        <input onclick="this.value='.$dbnumber.'" type="button" value="View Number" style="margin-left:20px; border:3px solid blue;border-radius:5px; background-color:#aaced1; margin-right:10px;"/>
        
      </div>
      </div>';
		}
	
}
?>
     
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-4 ">
<div class="hot-properties hidden-xs">
<h4>Students --> </h4>
<div id ="div1">

</div>



</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<!--<div class="pull-left result">Showing: 12 of 100 </div>-->

</div>
<div class="row">

      <!-- properties -->
	  <?php
include 'connection.php';
		// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);


$q="Select * from users where t8='Student'";
$r = mysqli_query($conn,$q);
if($r|| mysqli_num_rows($r)){
	   
		while($row = mysqli_fetch_assoc($r))
		{
		
			
      $dbuname = $row['t1'];
      $dbnumber = $row['t6'];
			
		
			echo ' <div class="col-lg-4 col-sm-6">
      <div class="properties">
      
        <h4>'.$dbuname.'</h4>
        <input onclick="this.value='.$dbnumber.'" type="button" value="View Number" style="margin-left:20px; border:3px solid blue;border-radius:5px; background-color:#aaced1; margin-right:10px;"/>
     
      </div>
      </div>';
		}
	
}
?>
     
</div>
</div>
</div>
</div>
</div>


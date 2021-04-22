<html>
<head>

<title>AdminPage</title>

<link rel="stylesheet" type="text/css" href="">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

.headerr{
  border: 1;
  clear:both;
  display:block;
  width: 96%;               
  background-color:#FFFF00;
  height: 1px;
}
</style>

</head>
<body>

<head>
<div class="container">
<div class="row">
<div class="col-md-6">
<img src="../logo.jpg"></div>
<div class="col-md-6">
<h3 style="color:003366;text-align:right;padding-right:40px;padding-top:30px;">
CLASS REPRESENTATIVE<BR> ELECTION SYSTEM</h3></div>
<hr class="headerr">
</div></div>
</head>


<div class="container">
<form method="post" action="result.php">
<div class="row">
<div class="col-md-3">

  <label for="cars">Choose a Stream:</label>
  <select id="stream" name="stream" required />
<option selected>select..</option>
    <option name="stream" value="BCOM">BCOM</option>
    <option name="stream" value="BSCIT">BSCIT</option>
    <option name="stream" value="BFM">BFM</option>
    <option name="stream" value="BMS">BMS</option>
    <option name="stream" value="BAF">BAF</option>
  </select>

</div>

<div class="col-md-3">

  <label for="cars">Choose YEAR:</label>
  <select id="YEAR" name="YEAR" required />
<option selected>select..</option>
    <option name="YEAR" value="FY">FY</option>
    <option name="YEAR" value="SY">SY</option>
    <option name="YEAR" value="TY">TY</option>
  </select>

</div>
<div class="col-md-3">

  <label for="cars">Choose a Division:</label>
  <select id="div" name="div" required />
<option selected>select..</option>
    <option name="div" value="A">A</option>
    <option name="div" value="B">B</option>
    <option name="div" value="C">C</option>
    <option name="div" value="D">D</option>
    <option name="div" value="E">E</option>
    <option name="div" value="F">F</option>
  </select>

</div>



<div class="col-md-3"><button type="submit" name="submit" value="submit">Submit</button></div></div>
</form>


<?PHP
if(isset($_POST['submit'])==false){
	 ?><DIV STYLE="color:red"><b><?php echo 'Please select above criteria';?></b></div><?php
} 
if(isset($_POST['submit'])==true){
 $_SESSION['stream']= $_POST['stream'];
 $_SESSION['YEAR']=$_POST['YEAR'];
 $_SESSION['div']= $_POST['div'];
}
if(isset($_SESSION['stream'])==TRUE){
	
?>


<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=CR;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 $k1=$_SESSION['stream'];
 $k2=$_SESSION['YEAR'];
 $k3= $_SESSION['div'];
 

 ?>

<br>
<div class="text-left"><h5>RESULTS :</h5></div><BR>


<div class="row">
<?php
$stmt= $db->query("select * from candidate where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3' ");
	while($row=$stmt->fetch()){


?>

 <div class="col-md-4">
 
 <?php if($row['picture']==NULL){ ?>
<div class="col-md-12" style="margin-left:20px;border:1px solid; height:250px; width:250px;">
<h6 style="">No Photo Available</h6></div>
<?php } else{ ?>
<div class="col-md-12" style="margin-left:20px;border:1px solid; height:250px; width:250px;">
 <img src="photo/<?php echo $row['picture']." " ?>" alt="" style="width: 200px; height: 220px;">
</div>
<?php } //else close?>
 <h5 class="text-center" ><?php echo $row['NAME']; ?></h5>
 
 <h5 class="text-center" >Total Votes :<?php echo $row['COUNT']; ?></h5>


 </div>
	<?php } ?>

</div>
<?php
$st= $db->query("select COUNT(*) from candidate where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3' ");
if ($st->fetchColumn() > 0) {
}
else{ ?>
<H2 style="padding-left:10%;color:red;border:2px dotted red;"> Please select the Candidate first or No Data Found.</h2>
<?php
} ?>
<br><form method="post" action="index.php" class="text-center"> 

<button type="submit" name="done" value="submit" class="btn btn-success">EXIT</button>
</form>

</div>




<?php }?></DIV><br>

<footer>
<hr color="7a7a52"><p style="text-align:center;">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
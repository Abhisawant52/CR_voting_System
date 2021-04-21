<html>
<head>

<title>Admin Page</title>

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
<img src="logo.jpg"></div>
<div class="col-md-6">
<h3 style="color:003366;text-align:right;padding-right:40px;padding-top:30px;">
CLASS REPRESENTATIVE<BR> ELECTION SYSTEM</h3></div>
<hr class="headerr">
</div></div>
</head>

<br>
<?PHP
session_start(); ?>
<div class="container text-center" style="border:1px solid;">

<div class="text-left"><br>
<h5>The Room ID IS: <?php echo $_SESSION['ID'];?></h5>
<h5>The Password IS: <?php echo $_SESSION['PASS'];?></h5></div>
<BR>
<form method="post" action="create2.php">
<div class="row">
<div class="col-md-3">

  <label for="cars">Choose a Stream:</label>
  <select id="stream" name="stream" required />
<option selected>select..</option>
    <option name="stream" value="BCOM">BCOM</option>
    <option name="stream" value="BSCIT">BSCIT</option>
    <option name="stream" value="BFM">BFM</option>
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
  </select>

</div>

<div class="col-md-3"><button type="submit" name="submit" value="submit">Submit</button></div></div>
</form>

<?PHP
if(isset($_SESSION['stream'])==false){
	 ?><DIV STYLE="color:red"><b><?php echo 'Please select above criteria';?></b></div><?php
} 
if(isset($_POST['submit'])==true){
 $_SESSION['stream']= $_POST['stream'];
 $_SESSION['YEAR']=$_POST['YEAR'];
 $_SESSION['div']= $_POST['div'];
}
if(isset($_SESSION['stream'])==TRUE){
	
?>
<div class="text-left"><h5>Select the candidate from below list :</h5></div>
<table class="text-center" style="border:1px solid;width:100%">
<tr style="border:1px solid;width:100%"><th>ROLLNo</th><th>NAME</th><th>PRNO</th><th>STREAM</th><th>YEAR</th><th>DIVISION</th><th>Select</th></tr>


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
 
	$stmt= $db->query("select * from student where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3' ");
	while($row=$stmt->fetch()){
        
	
?>

<tr style="border:1px solid;width:100%">
<td> <?php echo $row['RNO']; ?></td>
<td class="text-left"><?php echo $row['NAME']; ?></td>
<td><?php echo $row['PRN']; ?></td>
<td><?php echo $row['STREAM']; ?></td>
<td><?php echo $row['YEAR']; ?></td>
<td><?php echo $row['DIVISION']; ?></td>
<td>
<form method="post" action="create2.php">
<input type="hidden" name="PRNOO" value="<?php echo $row['PRN']; ?>" readonly />
<button type="submit" name="execute" value="submit" class="btn " style="color:green;"><b>Select</b></button>

</form>
</td>
</tr>

<?php  } ?>
<?PHP
$stmt->execute();
$row = $stmt->fetch();
if (!$row) { 
    ?><DIV STYLE="color:red"><b><?php echo 'No data found';?></b></div><?php
}


?>
<?PHP
if(isset($_POST['execute'])==true){ 
$k8=$_POST['PRNOO'];
foreach($db->query("select * from student where PRN = '$k8' ")as $row){
		
		$k11=$row['PRN'];
	    $k12=$row['NAME'];
 		$k13=$row['STREAM'];
		$k14=$row['YEAR'];
		$k15=$row['DIVISION'];
	}
 $st2=$db->prepare("insert into candidate values('$k11','$k12','$k13','$k14','$k15',0,null)");
 $st2->execute();
}
 ?>



</table>
<br>
<div class="text-left"><h5>Selected candidate :</h5></div>


<div class="row">
<?php
$stmt= $db->query("select * from candidate where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3' ");
	while($row=$stmt->fetch()){
		

?>
<div class="col-md-4">
<?php if($row['picture']==NULL){ ?>
<div class="col-md-12" style="margin-left:20px;border:1px solid; height:250px; width:250px;">
<form method="POST" enctype="multipart/form-data" action="upload.php">
<input type="hidden" name="number" value="<?php echo $row['PRN']; ?>" readonly />
<p>upload Photo:&nbsp;&nbsp;</p> <input type="file" name="photo" value="" required />
<br><br><button type="submit" name="insert" value="submit" class="btn btn-success" >Submit</button>
</form>

</div>
<?php }else{	?>
<div class="col-md-12" style="margin-left:20px;border:1px solid; height:250px; width:250px;">
 <img src="photo/<?php echo $row['picture']." " ?>" alt="" style="width: 200px; height: 220px;">
</div>
<?php } ?>
<br>
<h5><?php echo $row['NAME']; ?></h5>
<form method="post" action="remove.php">
<input type="hidden" name="entery" value="<?php echo $row['PRN']; ?>" readonly />
<button type="submit" name="remove" value="submit" class="btn " style="color:red;"><b>REMOVE</b></button>
</form>
</div>
	<?php } ?>

</div>


<br><form method="post" action="../index.php" class="text-center"> 
<button type="submit"  value="submit" class="btn btn-success">Exit</button>
</form>

</div>

<?php
if(isset($_POST['done'])==true){
$l1=$_SESSION['ID'];
$l2=$_SESSION['PASS'];
$stmt=$db->prepare("UPDATE student SET roomid = '$l1' , password = '$l2' where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3'  ");
$stmt->execute();	

}
?>


<?php }?></DIV><br>
<footer>
<hr color="7a7a52"><p style="text-align:center;">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
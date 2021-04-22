<html>
<head>

<title>Student Page</title>

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

<?php
session_start();
 $k33= $_SESSION['s1'];
 
 try{
	$db= new PDO('mysql:host=localhost;dbname=CR;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
$stmt= $db->query("select 	NAME ,STREAM, YEAR, DIVISION ,vote ,PRN from student where PRN ='$k33' ");
while($row=$stmt->fetch()){
	$k4=$row['NAME'];
	$k1=$row['STREAM'];
	$k2=$row['YEAR'];
	$k3=$row['DIVISION'];
	$k5=$row['vote'];
	$k6=$row['PRN'];
}


?>

<h4 style="margin-left:40px;">Welcome <?php echo $k4;?>
<h5 style="margin-left:40px;"><?php echo $k1 ?>-<?php echo $k2 ?>-<?php echo $k3 ?> </h5> <h6 style="margin-left:40px;color:Red;"> You can give vote only once</h6></h4>
<br>
<div class="container">
<div class="row">
<?php 
if($k5==0)
{
	
	//for voting code
	
	
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
 
 <?//vote button ?>
<form method="post" action="studentvote.php">
<input type="hidden" name="studPRN" value="<?php echo $k33 ;?>" readonly />
<input type="hidden" name="CandiPRN" value="<?php echo $row['PRN']; ?>" readonly />
<button type="submit" name="vote" class="btn btn-success " value="submit" style="margin-left:120px;">Vote</button>
</form>
 
 </div>
<?php }  //close query?>


<?php 	
}	//close k==0
?>


<?php 
if($k5==1)
{
?>
 <H2 style="margin-left:22%;color:green;border:2px dotted green;"> Your vote is alredy successfully Registerd.</H2>
<br>
<a href="result.php" style="margin-left:40%;color:#fce803;"><H2> View Result</H2></a>
<?php 	
}	//close k==1
?>
</div></div>


<?php
if(isset($_POST['vote'])==true){
	$CandiPRN= $_POST['CandiPRN'];
	$STUDENTPRN= $_POST['studPRN'];
	
$stmt1=$db->prepare("UPDATE student SET vote = 1  where PRN='$STUDENTPRN'  ");
$stmt1->execute();
 
 $st1=$db->prepare(" UPDATE candidate SET count = count + 1 WHERE PRN='$CandiPRN'  ");
 $st1->execute();
 $refreshAfter = 0.1;
header('Refresh: ' . $refreshAfter);

}
?>
<footer>
<hr color="7a7a52"><p style="text-align:center;">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
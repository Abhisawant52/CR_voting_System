<html>
<head>

<title>Admin Page</title>

<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>

<head>
<div class="container">
<div class="row">
<div class="col-md-6">
<img src="../logo.jpg"></div>
<div class="col-md-6">
<h3 class="title">
CLASS REPRESENTATIVE<BR> ELECTION SYSTEM</h3></div>
<hr class="headerr">
</div></div>
</head>

<?php
session_start();
if(isset($_POST['ID'])==true){

 $_SESSION['ID']=$_POST['ID'];
}
?>

<div class="container text-center" style="border:1px solid;">
<form method="post" action="create.php">
<br><div class="row">
<div class="col-md-6 text-right"> Room ID:</div>
<div class="col-md-6 text-left"><input type="text" name="" value="<?php echo $_SESSION['ID']; ?>" disabled /></div>
</div>
<br><div class="row">
<div class="col-md-6 text-right">Set Password :</div>
<div class="col-md-6 text-left"><input type="password" name="PASS1" value="" required /></div>
</div>
<br><div class="row">
<div class="col-md-6 text-right">confirm Password :</div>
<div class="col-md-6 text-left"><input type="password" name="PASS2" value="" required /></div>
</div>


<?php

if(isset($_POST['submit'])==true){
  $errors=array();
	$k1="";
	$k2="";

 $k1=$_POST['PASS1'];
 $k2=$_POST['PASS2'];

 if(empty($k1)){
	 array_push($errors,"password is required");
 }
  if(empty($k2)){
	 array_push($errors,"confirm-password is required");
 }
 if(strlen($_POST['PASS1'])< '6'){
	array_push($errors,"your password must conatin 6 digits");
}
	if(!preg_match("#[0-9]+#",$_POST['PASS1'])) {
            array_push($errors,"Your Password Must Contain At Least 1 Number!");
        }
	if(!preg_match("#[A-Z]+#",$_POST['PASS1'])) {
            array_push($errors,"Your Password Must Contain At Least 1 Capital Letter!");
        }
        if(!preg_match("#[a-z]+#",$_POST['PASS1'])) {
            array_push($errors,"Your Password Must Contain At Least 1 Lowercase Letter!");
        } 
 if($k1 != $k2){
	 array_push($errors,"passwords do not match");
 }

if(count($errors )==0){	
$_SESSION['PASS']= $_POST['PASS1'];
$_SESSION['DESP']= $_POST['DESP'];
header("Location:create2.php"); 
}
if(count($errors )>0){
foreach($errors as $error){
   ?><div style="color:red;"> <?php echo $error . "<br>";?></div><?php
}
}

}
?>
<br>
<div class="row">
<div class="col-md-6" style="text-align:right;">
<button type="submit" name="submit" value="submit">Submit</button>
</form></div>

<div class="col-md-6"  style="text-align:left;">
<form action="home.php" method="post">
<button type="submit">Cancel</button>
</form></div>

</div>

</div>

<br>

<footer>
<hr color="7a7a52">
<p class="footer">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
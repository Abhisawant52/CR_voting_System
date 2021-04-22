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


<div class="container text-center" style="border:1px solid;">
<form method="post" action="index.php">
<br><div class="row">
<div class="col-md-6 text-right"> Room ID:</div>
<div class="col-md-6 text-left"><input type="text" name="ID" value="" required/></div>
</div>
<br><div class="row">
<div class="col-md-6 text-right">Password :</div>
<div class="col-md-6 text-left"><input type="password" name="PASS1" value="" required /></div>
</div>
<br><div class="row">
<div class="col-md-6 text-right">Student PRN Number :</div>
<div class="col-md-6 text-left"><input type="text" name="PRN" value="" required /></div>
</div>
<?php

if(isset($_POST['submit'])==true){
  $errors=array();
	$k1="";
	$k2="";
	$k3="";
	
try{
	$db= new PDO('mysql:host=localhost;dbname=cr;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	

 $k1=$_POST['ID'];
 $k2=$_POST['PASS1'];
 $k3=$_POST['PRN'];

 if(empty($k1)){
	 array_push($errors,"Room ID is required");
 }
  if(empty($k2)){
	 array_push($errors,"Password is required");
 }
  if(empty($k3)){
	 array_push($errors,"Student PRN Number is required");
 }
 if(count($errors )==0){	 
 $stmt= $db->query("select PRN  from student where PRN ='$k3' and roomid='$k1' and password= '$k2' ");
while($row=$stmt->fetch()){
	$PRN=$row['PRN'];

}
}
 $stmt->execute();
if(isset($PRN  )==1){
session_start();
 $_SESSION['s1']=$PRN;
 header('location:Studentvote.php');
 
 }
 else{
		array_push($errors,"invalid PRN , RoomID and password");
 }
if(count($errors )>0){
foreach($errors as $error){
   ?><div style="color:red;"> <?php echo $error . "<br>";?></div><?php
}
}


}
?>

<br>

<button type="submit" name="submit" value="submit">Submit</button>
<button type="submit">Cancel</button>



</form>
</div>






<br>



<footer>
<hr color="7a7a52"><p style="text-align:center;">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
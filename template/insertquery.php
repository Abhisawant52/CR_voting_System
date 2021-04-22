<?php
session_start();
try{
	$db= new PDO('mysql:host=localhost;dbname=CR;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}

if(isset($_POST['exit'])==true){

$k1=$_SESSION['stream'];
$k2=$_SESSION['YEAR'];
$k3= $_SESSION['div'];
 
$l1=$_SESSION['ID'];
$l2=$_SESSION['PASS'];
$stmt=$db->prepare("UPDATE student SET roomid = '$l1' , password = '$l2' where STREAM='$k1' and YEAR='$k2' and DIVISION='$k3'  ");
$stmt->execute();
header("Location:result.php");
exit();	

}
?>
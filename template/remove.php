 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=cr;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
if(isset($_POST["remove"]))
	{
		$id=$_POST["entery"];
		
	
 
 $stmt=$db->prepare("Delete from candidate where PRN =$id  ");
 
 $stmt->execute();
header("location:create2.php");
exit();
}


?>
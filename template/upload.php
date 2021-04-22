<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=cr;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
if(isset($_POST["insert"]))
	{
		$file=$_FILES['photo'];
		echo $no=$_POST['number'];
	 
 PRINT_R( $file);
 
 $filename= $file['name'];
 $filepath= $file['tmp_name'];
 $fileerror= $file['error'];


 if($fileerror == 0){
 $destfile= 'photo/'.$filename;
 ECHO  $destfile;
 
 move_uploaded_file($filepath, $destfile);
 } 
 $stmt=$db->prepare("UPDATE candidate SET picture ='$filename' where PRN = $no ");
 $stmt->execute();
 
header("location:create2.php");
exit();

}
?>
		
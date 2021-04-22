<html>
<head>

<title>Admin Page</title>

<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>


<head>
<div class="container">
<div class="row">
<div class="col-md-6">
<img src="logo.jpg"></div>
<div class="col-md-6">
<h3 class="title">
CLASS REPRESENTATIVE<BR> ELECTION SYSTEM</h3></div>
<hr class="headerr">
</div></div>
</head>



<div class="container">
<div class="row">
<div class="col-md-6">
<form method="post" action="template/create.php">
<input type="hidden" name="ID" value="<?php echo  "MLDC" . rand(10000,99999999)?>" readonly />
<button type="submit" class="btn1">
<div id="circle">
<i class="Fa-icon fa fa-plus-circle" style="font-size:100px;color:white;margin-top:48px;margin-left:4px;"></i>
<h5 style="color:white;">Create Room</h5>
</div></div></button></form>

<div class="col-md-6">
<form method="post" action="template/result.php">
<button type="submit" class="btn1">
<div id="circle">
<i class="fa fa-clipboard" style="font-size:100px;color:white;margin-top:48px;margin-left:4px;"></i>
<h5 style="color:white;">View Results</h5>
</div></div></button></form>


</div>
</div>

<br>
<?php 
session_start();

session_destroy();

?>
<footer>
<hr color="7a7a52">
<p class="footer">Copyright <i class="fa fa-at" aria-hidden="true"></i> 2020. All rights are not reserved.</p></div>
</footer>

</body>
</html>
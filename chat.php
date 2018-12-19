<?php
session_start();
$receiver_id=$_GET['receiver_id'];
include "class.functions.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Bhubaneswar ">
	<meta name="keywords" content="Odisha"/>
    <meta name="author" content="Alumni Connect platform">
    <link rel="icon" href="../../favicon.ico">

    <title>AlumniKonnect</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
<img src="img/g22.png">
<h4 class="alert alert-info text-center">Welcome to College Circle</h4>			
<p class="text-right">Welcome :<?php echo $_SESSION['alumniname']; ?></p>
<?php
require_once("menu.inc.php");
?>
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span>Chat Messages</h4>
<div class="col-sm-12 alert alert-success" >
</div>
</div>
<?php
$obj=new functions();
$obj-> chathistory($_SESSION['alumni'],$receiver_id);
?>
<form class="alert alert-success" action="savechat.php" method="POST">
<input class="col-sm-offset-2 col-md-6" type="text" name="search1">
<input type="hidden" name="receiver" value="<?php echo $receiver_id;?>">
<button class=""type="submit" name="submit"><span class="glyphicon glyphicon-search"></span> Send</button>
</form>
</div>
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
</body>
</html>







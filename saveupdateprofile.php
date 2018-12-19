<?php
session_start();
$user_id=$_SESSION['alumni'];
include 'class.functions.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$dob=$_POST['dob'];
$tenth=$_POST['tenth'];
$tenthcity=$_POST['tenthcity'];
$tenthyear=$_POST['tenthyear'];
$twelve=$_POST['twelve'];
$twelvecity=$_POST['twelvecity'];
$twelveyear=$_POST['twelveyear'];
$college=$_POST['college'];
$collegeyear=$_POST['collegeyear'];
$collegecity=$_POST['collegecity'];
$current=$_POST['current'];
$currentcity=$_POST['currentcity'];
$company=$_POST['company'];
$tablename='profile';
$target_file = "images/".rand(1,100000).rand(1,100000).".jpeg";
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
$obj= new functions();
$result=$obj->saveupdateprofile($user_id,$name,$dob,$tenth,$tenthcity,$tenthyear,$twelve,$twelveyear,$twelvecity,$college,$collegecity,$collegeyear,$current,$company,$currentcity,$target_file);
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
<div class="container">	
<h4 class="alert alert-info text-center">Welcome to AlumniKonnect</h4>		
<p class="text-right">Welcome :<?php echo $_SESSION['alumniname']; ?> </p>
<?php
require_once("menu.inc.php");
?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-info"><p class="text-center">UpdateProfile</p></div>

<?php
if($result==1)
{
?>
<div class="col-sm-12 alert alert-success">
<p class="text-center" >Profile Updated Successfully</p>
</div>
<?php
}
else
{
?>
	<div class="col-sm-12 alert alert-danger">
<p class="text-center">Profile Not Updated</p>
</div>
<?php
}
}
?>
</div>
</div>
</div>
</div>
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
</body>
</html>

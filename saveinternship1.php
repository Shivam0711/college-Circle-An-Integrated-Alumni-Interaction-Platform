<?php
session_start();
include 'class.functions.php';
if(isset($_POST['submit']))
{
$name=$_POST['companyname'];
$type=$_POST['type'];
$stipend=$_POST['stipend'];
$location=$_POST['location'];
$lastdate=$_POST['lastdatetoapply'];
$whocanapply=$_POST['whocanapply'];
$period=$_POST['period'];
$emailid=$_POST['emailid'];
$target_file = "internshipImages/".rand(1,1000000).rand(1,100000).".jpeg";
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
$obj= new functions();
$result=$obj->saveinternship($name,$type,$stipend,$location,$lastdate,$whocanapply,$period,$emailid,$target_file);
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

    <title>College Circle</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<div class="container">	
<img src="img/g22.png">
<h4 class="alert alert-info text-center">Welcome to College Circle</h4>		
<p class="text-right">Welcome :<?php echo $_SESSION['alumniname']; ?></p>
<?php
require_once("menu.name.php");
?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-info"><p class="text-center">Add InternShip/Job</p></div>

<?php
if($result==1)
{
?>
<div class="col-sm-12 alert alert-success">
<p class="text-center">Internship/Job Has Been Created Successfully.Thank You</p>
</div>
<?php
}
else
{
?>
	<div class="col-sm-12 alert alert-danger">
<p class="text-center" >Internship/Job Not Saved</p>
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

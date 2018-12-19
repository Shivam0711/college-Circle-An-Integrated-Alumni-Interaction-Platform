<?php
session_start();
include_once("class.functionscollege.php");
$user_id=(isset($_POST['user_id'])) ? trim($_POST['user_id']) : '';
$password=(isset($_POST['password'])) ? trim($_POST['password']) : '';

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
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> College Section</h4>
<div class="col-sm-12 alert alert-success" >
<p class="text-center" ></p>
</div>
<div class="col-md-12">
<?php
$obj=new college();
$result=$obj->checkcollegelogin1($user_id,$password);
if($result==1)
{
  include_once('redirect.inc.php');	
}
else
{
	?>
    <div class="col-sm-12 alert alert-success" >
<p class="text-center" >Wrong User Id And Password.Please Try Again</p>
</div>
<?php
}
	
?>
</div>
</div>
</div>
</div>
</div>
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
</body>
</html>


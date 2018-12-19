<?php
session_start();
$mobileno=$_SESSION['mobileno'];
$emailid=$_SESSION['emailid'];
$password=$_SESSION['password'];
include "class.SignUp.php";
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
<body>
<div class="container">
<img src="img/g22.png">	
<h4 class="alert alert-info text-center">Welcome to College Circle</h4>	
<p class="text-right">Welcome  :<?php echo $_SESSION['alumniname']; ?></p>		
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
<?php
if(isset($_POST['submit'])){
if($_POST['otp2']!=$_SESSION['originalotp'])
{
?>
<div class="col-sm-12 alert alert-danger"><p>OTP did not Match.<a href="signup.php">Click Here To Try Again</a></p>
</div>
<?php
}
else
{ 
      $tablename='users';
      $obj= new SignUp();
      $result=$obj->signuptest($tablename,$mobileno,$emailid,$password);
	  if($result==1)
	  {
?>
   <div class="col-sm-12 alert alert-success" >
   <p class="text-center" id="onSuccessLoginDisplay">Sign Up Successfull.<a href="login.php">Click Here</a>To Go To The Login Page</p>
   </div>	  
<?php
	  }
	  else{
?>
	  <div class="col-sm-12 alert alert-danger"><p>SignUp Not Successful.Please Try Again<a href="signup.php">Click Here To Try Again</a></p>
</div>
<?php	  
	  }
		  
} //end else

}
unset($_SESSION['emailid']);
unset($_SESSION['mobileno']);
unset($_SESSION['password']);
unset($_SESSION['originalotp']);
?>
</div> <!-- /container -->
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</div>
</div>
</footer>
</body>
</HTML>

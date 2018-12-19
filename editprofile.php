<?php
session_start();
include_once("class.functions.php");
$user_id=$_SESSION['alumni'];
$obj= new functions($user_id);
$result=$obj->viewupdateprofile($user_id);
extract($result);
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
<p class="text-right">Welcome :<?php echo $_SESSION['alumniname']; ?></p>
<?php
require_once("menu.inc.php");
?>			
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span>Profile</h4>
<div class="col-sm-12 alert alert-success">
<p class="text-center"></p>
</div>
</div>
<form class="form-horizontal" method="POST" action="saveupdateprofile.php" enctype="multipart/form-data">
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name" placeholder="Enter Name" required value="<?php echo $result['name'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Date Of Birth</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="dob" placeholder="Date Of Birth" required value="<?php echo $result['dob'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 10th</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="tenth" placeholder="10th" required value="<?php echo $result['tenth'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 10th City</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="tenthcity" placeholder="10th City" required value="<?php echo $result['tenthcity'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 10th Passing Year</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="tenthyear" placeholder="10th Year" required value="<?php echo $result['tenthyear'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 12th</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="twelve" placeholder="12th" value="<?php echo $result['twelve'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 12th city</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="twelvecity" placeholder="10th city" value="<?php echo $result['twelvecity'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> 12th Passing Year</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="twelveyear" placeholder="12th Year" value="<?php echo $result['twelveyear'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> College</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="college" placeholder="College" value="<?php echo $result['college'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> College City</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="collegecity" placeholder="College city" value="<?php echo $result['collegecity'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> College passing Year</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="collegeyear" placeholder="College Year" value="<?php echo $result['collegeyear'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Current Status</label>
<div class="col-sm-10">
<select class="form-control" name="current" required value="<?php echo $result['current'];?>">
<option value="0">Select</option>
<option value="1">Working</option>
<option Value="2">Student</option>
</select>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Company/college/School Currently In</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="company" placeholder="Company" required value="<?php echo $result['company'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Current City</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="currentcity" placeholder="Current City" required value="<?php echo $result['currentcity'];?>">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Upload Picture</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="photo" required value="<?php echo $result['photo'];?>">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-block" name="submit"><span class="glyphicon glyphicon-log-in"></span> Update Profile</button>
</div>
</div>
</form>
</div>
</div>
</div> <!-- /container -->
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
  </body>
</html>

<?php
session_start();
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
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span>College Login</h4>
<div class="col-sm-12 alert alert-success" >
<p class="text-center" ></p>
</div>
<div class="text-center">
</div>
<form class="form-horizontal" action="collegelogin.php" method="POST">
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>User Id</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="user_id" placeholder="User Id" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password" placeholder="Password" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-block" id="submitbtn"><span class="glyphicon glyphicon-log-in"></span>Sign In</button>
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

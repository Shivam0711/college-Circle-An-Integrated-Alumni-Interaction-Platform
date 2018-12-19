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
<h4 class="alert alert-info text-center">Welcome to Alumni Circle</h4>			
<p class="text-right">Welcome :<?php echo $_SESSION['alumniname']; ?></p>
<?php
require_once("menu.inc.php");
?>
<div class="row">
<div class="col-md-12">
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> Donations</h4>
<div class="col-sm-12 alert alert-success" >
<p class="text-center" ><a href="img/bitmap.png" target="_blank" onclick="window.open('img/bitmap.png', 'popup', 'height=400, width=400'); return false;"> <span class="glyphicon glyphicon-qrcode"></span> Click Here To View QR Code and Then Pay.</a></p>
</div>
</div>
<form class="form-horizontal" method="POST" action="savedonations.php" enctype="multipart/form-data">
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>College Name To Which You Want To Donate</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="collegename" placeholder="Enter College Name To Which You Want To Donate" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>College City</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="collegecity" placeholder="College City" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>Amount You Want To Donate</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="amount" placeholder="amount" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>Enter Paytm Number Through Which You Will Donate</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="paytmno" placeholder="Enter Paytm Number Through Which You Will Donate" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>Enter Paytm Transaction Number After Successful Transaction</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="transactionid" placeholder="Enter Paytm Transaction Number After Successful Transaction" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-block" name="submit"><span class="glyphicon glyphicon-log-in"></span> Donate</button>
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

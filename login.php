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
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> Login</h4>
<div class="col-sm-12 alert alert-success" id="login">
<p class="text-center" id="onSuccessLoginDisplay"></p>
</div>
<div class="col-sm-12 alert alert-danger" id="errorslist">
</div>
<div class="text-center">
</div>
<form class="form-horizontal" id="loginForm">
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Mobile Number</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="mobileno" placeholder="Mobile No.">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password" placeholder="Password">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-eye-open"></span>Code</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="captcha" placeholder="Captcha Code" autocomplete="off">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-6">
<label><a href="#" onclick="document.getElementById('captchaImage').src='ImagesGenCaptcha.php?'+ Math.random(); return false">&nbsp;&nbsp;<img src="img/reload-icon.png"/>&nbsp;Reload</a>
<img src="ImagesGenCaptcha.php" id="captchaImage" /></label>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-block" id="submitbtn"><span class="glyphicon glyphicon-log-in"></span> Login</button>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="bootstrap/js/jquery1.11.3.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$('#login').hide();
$('#errorslist').hide();

$('#submitbtn').click(function(event){
var errors=[];
$('#login').hide();
$('#errorslist').hide();
$('#errorslist').html("");
$('#onSuccessLoginDisplay').html("") ;
var mobileno,password,captchaval;
mobileno=$('#mobileno').val();
password=$('#password').val();
captchaval=$('#captcha').val();
if(mobileno==''){
		errors[errors.length]="Please fill mobile number.";
		}
if(password==''){
		errors[errors.length]="Please fill password.";
		}		
if(captchaval==''){
		errors[errors.length]="Please fill captcha value.";
		}else{
		if (captchaval.length < 5 || captchaval.length > 5)
		{
		errors[errors.length]="Filled code is not valid.";
		}
		}
if(errors.length > 0)
		{
		alert("Total " + errors.length + " errors , Kindly correct.");
		$('#errorslist').show();
		var errlist = $( "#errorslist" );
		errlist.append($( "<p class='text-danger'><strong>Errors : Kindly rectify.</strong></p>" ));
		$.each(errors,function( index, value ){
		errlist.append($( "<p class='text-danger'>" + value + "</p>" ));
		});
		}else
		{		
		$('#loginForm').hide();
		var submit=true;
		var post_data = new FormData();
		post_data.append( 'mobileno', mobileno );
		post_data.append( 'password', password );
		post_data.append( 'captchaval', captchaval );
		post_data.append( 'submit', submit );

$.ajax({
type: "POST",
url: "testlogin.php",
data: post_data,
processData: false,
contentType: false, 
cache: false,
success: function(data){
if(data[0]=="true"){
if(data[1]=="u"){
 window.setTimeout(function () {
 window.location.href="enterprofile.php";
  },0)
 }
else if(data[1]=="nu"){
 window.setTimeout(function () {
 window.location.href="index.php";
  },0)
  }
 }
 
 else if(data[0]=="false"){
$('#onSuccessLoginDisplay').html("Mobile number and Password did not match. Please try again.");
$('#login').show();
$('#mobileno').val('');
$('#password').val('');
$('#captcha').val('');
$('#loginForm').show();
 }
  else{
$('#errorslist').html(data[0]) ;
$('#errorslist').show();
}
},
 error : function(data){
$('#errorslist').html("Server Error");
$('#errorslist').show();
        }
});
	}	
 event.preventDefault();
});
});
</script>
  </body>
</html>

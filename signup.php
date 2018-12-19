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
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
<div class="col-sm-12 alert alert-success" id="Sign Up">
<p class="text-center" id="onSuccessLoginDisplay"></p>
</div>
<div class="col-sm-12 alert alert-danger" id="errorslist">
</div>
<div class="text-center">
</div>
<form class="form-horizontal" id="signUpForm">
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Mobile Number</label>
<div class="col-sm-10">
<input type="text" class="form-control"  id="mobileno" placeholder="Mobile No.">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span> Email Id</label>
<div class="col-sm-10">
<input type="text" class="form-control"  id="emailid" placeholder="Email Id">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>User Type</label>
<div class="col-sm-10">
<select class="form-control" id="usertype">
<option value="0">Select</option>
<option value="User">User</option>
<option value="College">College</option>
</select>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
<div class="col-sm-10">
<input type="password" class="form-control"  id="password1" placeholder="Password">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" id="password2" placeholder="Confirm Password">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label"><span class="glyphicon glyphicon-user"></span>Want To Share Your Contact No. With Others</label>
<div class="col-sm-10">
<select class="form-control" id="share">
<option value="0">Select</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-success btn-block"  id="submitbtn"><span class="glyphicon glyphicon-log-in"></span> Sign Up</button>
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
$('#Sign Up').hide();
$('#errorslist').hide();

$('#submitbtn').click(function(event){
var errors=[];
$('#Sign Up').hide();
$('#errorslist').hide();
$('#errorslist').html("");
$('#onSuccessLoginDisplay').html("") ;
var mobileno,password1,password2,emailid,usertype;
mobileno=$('#mobileno').val();
password1=$('#password1').val();
emailid=$('#emailid').val();
password2=$('#password2').val();
usertype=$('#usertype').val();
share=$('#share').val();
if(mobileno==''){
		errors[errors.length]="Please fill mobile number.";
		}
if(password1==''){
		errors[errors.length]="Please fill password.";
		}	
if(password2==''){
		errors[errors.length]="Please confirm password.";
		}			
if(emailid==''){
		errors[errors.length]="Please fill emailid.";
		}
if(usertype==0){
		errors[errors.length]="Please fill usertype.";
		}
if(share==0){
		errors[errors.length]="Please fill Your Sharing Details.";
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
		$('#signUpForm').hide();
		var submit=true;
		var post_data = new FormData();
		post_data.append( 'mobileno', mobileno );
		post_data.append( 'password1', password1 );
		post_data.append( 'password2', password2 );
		post_data.append( 'emailid', emailid );
		post_data.append( 'usertype', usertype );
		post_data.append( 'share', share );
        post_data.append( 'submit', submit );
$.ajax({
type: "POST",
url: "testsignup.php",
data: post_data,
processData: false,
contentType: false, 
cache: false,
success: function(data){
if(data[0]=="allowed"){

	
 $('#onSuccessLoginDisplay').html("An OTP Has Been Sent To Your Number") ;
 $('#Sign Up').show();
 window.setTimeout(function () {
 window.location.href="confirmsignup.php";
  }, 1000)
 }
else if(data[0]=="notallowed"){
$('#onSuccessLoginDisplay').html("An Account with This Mobile number Already Exists. Please try again.");
$('#Sign Up').show();
$('#mobileno').val('');
$('#password').val('');
$('#captcha').val('');
$('#signupForm').show();
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

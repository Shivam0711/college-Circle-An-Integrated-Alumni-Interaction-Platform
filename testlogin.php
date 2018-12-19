<?php
include 'class.Test.php';
$mobileno=(isset($_POST['mobileno'])) ? trim($_POST['mobileno']) : '';
$password=(isset($_POST['password'])) ? trim($_POST['password']) : '';
$captcha=(isset($_POST['captchaval'])) ? trim($_POST['captchaval']) : '';
$errors=[];
$errorall='';
if(isset($_POST['submit'])){
if(empty($mobileno)){
$errors[]='Please fill mobile number.';
}
if(empty($password)){
$errors[]='Please fill Password.';
}
if(empty($captcha)){
$errors[]='Please fill captcha.';
}
if($captcha==$_SESSION['captcha_code'])	{
	
}else{
$errors[]='Wrong Captcha Code';	
	}
if(count($errors)>0){
foreach($errors as $error) {
$errorall .= $error;
}
$result=["$errorall"];
}
else{
$tablename='users';
$obj= new Test();
$result=$obj->testLogin($tablename,$mobileno,$password);

} //end else
header('content-type: application/json');
echo json_encode($result);
}//end submit
?>

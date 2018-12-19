<?php
include 'class.SignUp.php';
$mobileno=(isset($_POST['mobileno'])) ? trim($_POST['mobileno']) : '';
$emailid=(isset($_POST['emailid'])) ? trim($_POST['emailid']) : '';
$password1=(isset($_POST['password1'])) ? trim($_POST['password1']) : '';
$password2=(isset($_POST['password2'])) ? trim($_POST['password2']) : '';
$usertype=(isset($_POST['usertype'])) ? trim($_POST['usertype']) : '';
$share=(isset($_POST['share'])) ? trim($_POST['share']) : '';
$errors=[];
$errorall='';
if(isset($_POST['submit'])){
if(empty($mobileno)){
$errors[]='Please fill mobile number.';
}
if(empty($password1)){
$errors[]='Please fill Password.';
}
if(empty($password2)){
$errors[]='Please confirm password.';
}
if(empty($emailid)){
$errors[]='Please enter email Id.';
}
if($password1!=$password2){
$errors[]='password did not match';
}

if(count($errors)>0){
foreach($errors as $error) {
$errorall .= $error;
}
$result=["$errorall"];
}
else
{ 
      $tablename='users';
      $obj= new SignUp();
      $result=$obj->testmobileno($tablename,$mobileno,$emailid,$password1,$usertype,$share);
} //end else
header('content-type: application/json');
echo json_encode($result);
}//end submit
?>

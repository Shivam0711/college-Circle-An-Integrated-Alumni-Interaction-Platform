<?php
session_start();
include_once 'db.inc.php';
class SignUp{
protected $user;
protected $pass;
protected $dbhost;
protected $dbname;
protected $dbh;
// Database connection handle
public function __construct() {
$this->user = MYSQL_USER;
$this->pass = MYSQL_PASSWORD;
$this->dbhost = MYSQL_HOST;
$this->dbname = MYSQL_DB;
}
public function __destruct() {
if($this->dbh){
$this->dbh->close();
}
}
protected function connect() {
$this->dbh = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB) OR DIE('Unable to connect. Check your connection Parameters.');
$this->dbh->set_charset('utf8');
}

public function signuptest($tablename,$mobileno,$emailid,$password,$usertype,$share) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($mobileno);
$password=$this->dbh->real_escape_string($password);
$emailid=$this->dbh->real_escape_string($emailid);
$usertype=$this->dbh->real_escape_string($usertype);
$share=$this->dbh->real_escape_string($share);
date_default_timezone_set('Asia/Calcutta');
$date=date('y/m/d');
$time=date("h:m:s");
$query="INSERT INTO users(user_mobile,user_password,user_email,user_creationdate,user_creationtime,user_status,user_check,user_type,user_contact) VALUES ('$mobileno',Password('$password'),'$emailid','$date','$time','y','0','$usertype','$share')";
$result=$this->dbh->query($query);
if($result)
{
  $values=1;	
}

else
{
	$values=0;
}

return $values;
}// end signuptest
public function testmobileno($tablename,$mobileno,$emailid,$password) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($mobileno);
$query="SELECT * FROM users WHERE user_mobile=$mobileno";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
$values=["notallowed"];
}
else
{
  $_SESSION['emailid']=$emailid;
  $_SESSION['mobileno']=$mobileno;
  $_SESSION['password']=$password;
  $_SESSION['originalOtp']=$password;
  $values=["allowed"];
}
return $values;
}// end of testmobileno
}//end of class
?>

<?php
session_start();
include_once 'db.inc.php';
class Test {
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

public function testLogin($tablename,$mobileno,$password) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($mobileno);
$password=$this->dbh->real_escape_string($password);
$query="select user_id,user_check from $tablename where user_mobile='".$mobileno."' and user_password=Password('".$password."')";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount > 0)
{
  unset($_SESSION['captcha_code']);
  $row = $result->fetch_array();
  extract($row);
  $_SESSION['alumni']=$row['user_id'];
  if($row['user_check']==0)
  {	  
    $values=["true","u"];
	
  }
  else
  $values=["true","nu"];
  
}
else
{
$values=["false"];
}
return $values;
}// end testLogin
}//end of class
?>

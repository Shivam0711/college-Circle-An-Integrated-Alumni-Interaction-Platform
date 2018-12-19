<?php
session_start();
include_once 'db.inc.php';
class college{
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
public function checkcollegelogin1($user_id,$password) {
if(!$this->dbh){
$this->connect();
}
$tablename="college";
$query="select * from $tablename WHERE unique_id='$user_id' AND password=Password('$password')";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
$row2 = $result->fetch_array();
if($rowcount > 0)
{
	extract($row2);
	$result=1;
	$_SESSION['college']=$row2['college_id'];
	$_SESSION['alumniname']=$row2['college_name'];
}
else
	$result=0;
return $result;
}//end of checkcollegelogin1
}//end of class
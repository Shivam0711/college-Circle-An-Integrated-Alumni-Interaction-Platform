<?php
  include_once 'db.inc.php';
class Alumni {
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
public function alumniname(){
	if(!$this->dbh){
$this->connect();
}
  $user_id=$_SESSION['alumni'];
  $query="select * from college where college_id=$user_id";
  $result2=$this->dbh->query($query);
  $rowcount=$result2->num_rows;
  if($rowcount > 0)
  {	  
  $row=$result2->fetch_array();
  extract($row);
  $_SESSION['alumniname']=$row['name'];
  }
}
}
?>
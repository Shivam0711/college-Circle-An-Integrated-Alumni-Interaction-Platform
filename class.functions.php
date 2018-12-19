<?php
include_once 'db.inc.php';
class functions{
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

public function testmobileno($tablename,$mobileno) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($mobileno);
$query="SELECT * FROM users WHERE user_mobile=$mobileno";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
$values=1;
}
else
{
  $values=0;
  
}
return $values;
}// end of testmobileno
public function changepassword($tablename,$password,$mobileno) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($mobileno);
$password=$this->dbh->real_escape_string($password);
$query="UPDATE users SET user_password=Password('$password') WHERE user_mobile='$mobileno'";
$result=$this->dbh->query($query);
if($result){
$values=1;
}
else
{
  $values=0;
  
}
return $values;
}// end of changepassword
public function changepassword1($tablename,$password,$user_id) {
if(!$this->dbh){
$this->connect();
}
$mobileno=$this->dbh->real_escape_string($user_id);
$password=$this->dbh->real_escape_string($password);
$query="UPDATE users SET user_password=Password('$password') WHERE user_id='$user_id'";
$result=$this->dbh->query($query);
if($result){
$values=1;
}
else
{
  $values=0;
  
}
return $values;
}// end of changepassword1
public function saveprofile($user_id,$name,$dob,$tenth,$tenthcity,$tenthyear,$twelve,$twelveyear,$twelvecity,$college,$collegecity,$collegeyear,$current,$company,$currentcity,$photo,$documents)
{
if(!$this->dbh){
$this->connect();
}
$query="INSERT INTO profile (user_id,name,dob,tenth,tenthcity,tenthyear,twelve,twelvecity,twelveyear,college,collegeyear,collegecity,current,company,currentcity,photo,documents) VALUES ('$user_id','$name','$dob','$tenth','$tenthcity',$tenthyear,'$twelve','$twelvecity',$twelveyear,'$college',$collegeyear,'$collegecity',$current,'$company','$currentcity','$photo','$documents') ";
$result=$this->dbh->query($query);
if($result)
{
	$query1="UPDATE users SET user_check='1' WHERE user_id='$user_id'";
	$result2=$this->dbh->query($query1);
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of saveprofile
function viewprofile1($table_name,$user_id,$user_name) {
if(!$this->dbh){
$this->connect();
}
$user_id=$this->dbh->real_escape_string($user_id);
$query="SELECT * FROM profile WHERE user_id=$user_id";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
$result = $result->fetch_array();
if($result)
{
	extract($result);
	$query4=$query="SELECT * FROM users WHERE user_id=$user_id";
        $result4=$this->dbh->query($query4);
	    $result4 = $result4->fetch_array();
		extract($result4);
?>
<head>
<title>College Circle</title>
</head>
<body>

<div class="container">	
<img src="img/g22.png">
<h4 class="alert alert-info text-center">Welcome to College Circle</h4>	
<p class="text-right">Welcome :<?php echo $user_name; ?></p>
<?php
require_once("menu.inc.php");
?>	
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> View Your Profile</h4>
<div class="example3">
<div class="row">
<div class="col-md-3">
<p></p>
<img class="image" src="<?php echo $result['photo'];?>" width="200" height="200">
<p></p>
</div>
<div class="col-md-9">
<p></p><p>NAME: <?php echo $result['name'];?></p>
<p>D/O/B: <?php echo $result['dob'];?></p>
<p>Contact Number: <?php echo $result4['user_mobile'];?></p>
<p>Email Id: <?php echo $result4['user_email'];?></p>
</div>
<div class="col-md-12">
<p>10th School Name: <?php echo $result['tenth'];?></p>
<p>10th School City: <?php echo $result['tenthcity'];?></p>
<p>Completion Year Of 10th: <?php echo $result['tenthyear'];?></p>
<?php
if(!empty($result['twelve']))
{	
?>
<p>12th School Name : <?php echo $result['twelve'];?></p>
<p>12th School City : <?php echo $result['twelvecity'];?></p>
<p>Completion Year Of 12th : <?php echo $result['twelveyear'];?></p>
<?php
}
?>
<?php
if(!empty($result['college']))
{	
?>
<p>College Name: <?php echo $result['college'];?></p>
<p>College City: <?php echo $result['collegecity'];?></p>
<p>Completion Year Of College: <?php echo $result['collegeyear'];?></p>
<?php
}
?>
<p>Current Status: <?php echo $result['current'];?></p>
<p>Currently<?php if($result['current']==1){?>Studying In:<?php}if($result['current']==2){?>Working In:<?php } echo $result['company'];?></p>
<p>Current City: <?php echo $result['currentcity'];?></p>
</div>
</div>
</div>
</div>
</div>
</body>
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
<style>
.image {
    border-radius: 50%;
}
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
</style>
</html>
<?php
}
}
}//end of viewprofile1

function viewprofile2($table_name,$user_id,$user_name) {
if(!$this->dbh){
$this->connect();
}
$user_id=$this->dbh->real_escape_string($user_id);
$query="SELECT * FROM profile WHERE user_id=$user_id";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
$result = $result->fetch_array();
if($result)
{
	extract($result);
	$query4=$query="SELECT * FROM users WHERE user_id=$user_id";
        $result4=$this->dbh->query($query4);
	    $result4 = $result4->fetch_array();
		extract($result4);
	
?>
<head>
<title>College Circle</title>
</head>
<body>

<div class="container">	
<img src="img/g22.png">
<h4 class="alert alert-info text-center">Welcome to College Circle</h4>	
<p class="text-right">Welcome :<?php echo $user_name; ?></p>
<?php
require_once("menu.inc.php");
?>	
<h4 class="text-center"><span class="glyphicon glyphicon-lock"></span> View Profile</h4>
<div class="example3">
<div class="row">
<div class="col-md-3">
<p></p>
<img class="image" src="<?php echo $result['photo'];?>" width="200" height="200">
<p></p>
</div>
<div class="col-md-9">
<p></p><p>NAME: <?php echo $result['name'];?></p>
<p>D/O/B: <?php echo $result['dob'];?></p>
<p>Contact Number: <?php echo $result4['user_mobile'];?></p>
<p>Email Id: <?php echo $result4['user_email'];?></p>
</div>
<div class="col-md-12">
<p>10th School Name: <?php echo $result['tenth'];?></p>
<p>10th School City: <?php echo $result['tenthcity'];?></p>
<p>Completion Year Of 10th: <?php echo $result['tenthyear'];?></p>
<?php
if(!empty($result['twelve']))
{	
?>
<p>12th School Name : <?php echo $result['twelve'];?></p>
<p>12th School City : <?php echo $result['twelvecity'];?></p>
<p>Completion Year Of 12th : <?php echo $result['twelveyear'];?></p>
<?php
}
?>
<?php
if(!empty($result['college']))
{	
?>
<p>College Name: <?php echo $result['college'];?></p>
<p>College City: <?php echo $result['collegecity'];?></p>
<p>Completion Year Of College: <?php echo $result['collegeyear'];?></p>
<?php
}
?>
<p>Current Status: <?php echo $result['current'];?></p>
<p>Currently<?php if($result['current']==1){?>Studying In:<?php}if($result['current']==2){?>Working In:<?php } echo $result['company'];?></p>
<p>Current City: <?php echo $result['currentcity'];?></p>
</div>
</div>
</div>
</div>
</div>
</body>
<footer class="footer">
<div class="container">
<?php require_once("footer.inc.php"); ?>
</div>
</footer>
<style>
.image {
    border-radius: 50%;
}
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
</style>
</html>
<?php
}
}
}//end of viewprofile2
public function findpeople($user_id){
if(!$this->dbh){
$this->connect();
}
$user_id=$this->dbh->real_escape_string($user_id);
$query="SELECT * FROM profile WHERE user_id=$user_id";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
$c=0;
if($rowcount>0){
$result = $result->fetch_array();
if($result)
{
	extract($result);
	$query2=$query="SELECT * FROM profile order by rand()";
    $result2=$this->dbh->query($query2);
	if($result2)
	{
      while($row =$result2->fetch_assoc())
      {
	     if(strcasecmp($result['tenth'],$row['tenth'])==0||strcasecmp($result['tenthcity'],$row['tenthcity'])==0||strcasecmp($result['twelve'],$row['twelve'])==0||strcasecmp($result['twelvecity'],$row['twelvecity'])==0||strcasecmp($result['college'],$row['college'])==0||strcasecmp($result['collegecity'],$row['collegecity'])==0||strcasecmp($result['company'],$row['company'])==0||strcasecmp($result['currentcity'],$row['currentcity'])==0)
		 {
			 $array[$c]=$row['user_id'];
			 $c++;
         }			 
	  }		  
	}
}
}
$d=$c-1;
$c=0;
$array;
while($c<=$d)
{
	$query3=$query="SELECT * FROM profile WHERE user_id=$array[$c]";
    $result3=$this->dbh->query($query3);
	$result3 = $result3->fetch_array();
	if($result3)
    {
		extract($result3);
		$query4=$query="SELECT * FROM users WHERE user_id=$array[$c]";
        $result4=$this->dbh->query($query4);
	    $result4 = $result4->fetch_array();
		extract($result4);
        $c++;
?>
<div class="example3">
<div class="row">
<div class="col-md-3">
<p></p>
<img class="image" src="<?php echo $result3['photo'];?>" width="200" height="200">
<p></p>
</div>
<div class="col-md-9">
<p></p><p>NAME: <?php echo $result3['name'];?></p>
<p>D/O/B: <?php echo $result3['dob'];?></p>
<?php
if(strcasecmp($result4['view_contact'],'yes')==0)
{
?>	
<p>Contact Number: <?php echo $result4['user_mobile'];?></p>
<p>Email Id: <?php echo $result4['user_email'];?></p>
<?php
}	
if(!empty($result3['college']))
{	
?>
<p>College Name: <?php echo $result3['college'];?></p>
<p>College City: <?php echo $result3['collegecity'];?></p>
<?php
}
?>
<p>Current Status: <?php echo $result3['current'];?></p>
<p>Currently: <?php if($result3['current']==1){?>Studying In:<?php}if($result3['current']==2){?>Working In:<?php } echo $result3['company'];?></p>
<p>Current City: <?php echo $result3['currentcity'];?></p>
<p><a href="profile.php?user_id=<?php echo $result3['user_id'];?>">View Full Profile</a></p>
<p><a href="chat.php?receiver_id=<?php echo $result3['user_id'];?>">Chat</a></p>
<?php echo"</div>"."</div>"."</div>"?>
<style>
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
.image {
    border-radius: 50%;
}
</style>
<?php
		
	}		
	
}
}//end of findpeople
public function searchpeople($search) {
if(!$this->dbh){
$this->connect();
}
    $search=$this->dbh->real_escape_string($search);
	$user_type="user";
	$query2=$query="SELECT * FROM profile";
    $result2=$this->dbh->query($query2);
	$rowcount=$result2->num_rows;
	$c=0;
	if($rowcount>0)
	{
      while($row =$result2->fetch_assoc())
      {
	     if(strcasecmp($search,$row['name'])==0||strcasecmp($search,$row['tenth'])==0||strcasecmp($search,$row['tenthcity'])==0||strcasecmp($search,$row['twelve'])==0||strcasecmp($search,$row['twelvecity'])==0||strcasecmp($search,$row['college'])==0||strcasecmp($search,$row['collegecity'])==0||strcasecmp($search,$row['company'])==0||strcasecmp($search,$row['currentcity'])==0)
		 {
			 $array[$c]=$row['user_id'];
			 $c++;
         }			 
	  }		  
	}
$d=$c-1;
$c=0;
if($d>=0)
{	
while($c<=$d)
{
	$query3=$query="SELECT * FROM profile WHERE user_id='$array[$c]'";
    $result3=$this->dbh->query($query3);
	$result3 = $result3->fetch_array();
    $c++;
	if($result3)
    {
		extract($result3);
?>
<div class="example3">
<div class="row">
<div class="col-md-3">
<p></p>
<img class="image" src="<?php echo $result3['photo'];?>" width="200" height="200">
<p></p>
</div>
<div class="col-md-9">
<p></p><p>NAME: <?php echo $result3['name'];?></p>
<p>D/O/B: <?php echo $result3['dob'];?></p>
<?php
if(!empty($result3['college']))
{	
?>
<p>College Name: <?php echo $result3['college'];?></p>
<p>College City: <?php echo $result3['collegecity'];?></p>
<?php
}
?>
<p>Current Status: <?php echo $result3['current'];?></p>
<p>Currently<?php if($result3['current']==1){?>Studying In:<?php}if($result3['company']==2){?>Working In:<?php } echo $result3['company'];?></p>
<p>Current City: <?php echo $result3['currentcity'];?></p>	
<p><a href="profile.php?user_id=<?php echo $result3['user_id'];?>">View Full Profile</a></p>
<?php echo"</div>"."</div>"."</div>"?>
<style>
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
.image {
    border-radius: 50%;
}
</style>
<?php
		
	}		
	
}
}
else{
?>
<div class="alert alert-danger"><p class="text-center">Sorry No Match Found.Please Try Again</p></div>
<?php
}

}//end of searchpeople
public function findinternship() {
if(!$this->dbh){
$this->connect();
}
	$query2=$query="SELECT * FROM internship order by rand()";
    $result2=$this->dbh->query($query2);
	if(mysqli_num_rows($result2)>0)
  {
	  while($result3 = mysqli_fetch_assoc($result2))
      {
	   	 
?>
<div class="example3">
<div class="row">
<div class="col-md-3">
<p></p>
<img class="image" src="<?php echo $result3['photo'];?>" width="200" height="200">
<p></p>
</div>
<div class="col-md-9">
<p></p><p>COMPANY NAME: <?php echo $result3['companyname'];?></p>
<?php
if(strcasecmp($result3['internshiporjob'],"INTERNSHIP")==0)
{	
?>
<p>TYPE: <?php echo "INTERSNSHIP";?></p>
<?php
}
else{
?>
<p>TYPE: <?php echo"JOB";?></p>
<?php
}
?>
<p>LOCATION: <?php echo $result3['location'];?></p>
<p>STIPEND: Rs. <?php echo $result3['salary'];?>/Month</p>
<p>FOR A PERIOD OF: <?php echo $result3['period'];?></p>
<p>LAST DATE TO APPLY: <?php echo $result3['lastdatetoapply'];?></p>
<p>WHO CAN APPLY: <?php echo $result3['whocanapply'];?></p>
<p>EMAIL ID OF COMPANY: <?php echo $result3['email_id'];?></p>
<?php echo"</div>"."</div>"."</div>"?>
<style>
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
.image {
    border-radius: 50%;
}
</style>
<?php
		
	}		
	
}

}//end of findinternship
public function saveinternship($name,$type,$stipend,$location,$lastdate,$whocanapply,$period,$emailid,$target_file)
{
if(!$this->dbh){
$this->connect();
}
$query="INSERT INTO internship(companyname,internshiporjob,salary,location,lastdatetoapply,whocanapply,period,email_id,photo) VALUES ('$name','$type','$stipend','$location','$lastdate','$whocanapply','$period','$emailid','$target_file')";
$result=$this->dbh->query($query);
if($result)
{
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of saveinternship
public function checkcollegelogin($college_name) {
if(!$this->dbh){
$this->connect();
}

		$query2="select * from profile where college='$college_name' ";
        $result2=$this->dbh->query($query2);
		?>
		   <div class='table-responsive'><table class='table table-striped'><thead><tr><th>Serial No.</th><th>Student Name</th><th>Student Contact Number</th><th>Student Email Id</th><th>Student D/O/B</th><th>10th School Name</th><th>10th School City</th><th>10th Passing Year</th><th>12th School Name</th><th>12th School City</th><th>12th School Year</th><th>College Name</th><th>College City</th><th>College Passing Year</th><th>Current Status</th><th>Current College/Company Name</th><th>Current City</th></tr></thead><tbody>
            <?php
			$c=1;
		while($row=$result2->fetch_assoc())
		{
			$user_id2=$row['user_id'];
			$query3="select * from users where user_id='$user_id2' ";
            $result3=$this->dbh->query($query3);
			$row3 = $result3->fetch_array();
			$rowcount3=$result3->num_rows;
			if($rowcount3>0)
			{	
			extract($row3);
			?>
            <tr><td><?php echo $c; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row3['user_mobile']; ?></td><td><?php echo $row3['user_email']; ?></td><td><?php echo $row['dob']; ?></td><td><?php echo $row['tenth']; ?></td><td><?php echo $row['tenthcity']; ?></td><td><?php echo $row['tenthyear']; ?></td><td><?php echo $row['twelve']; ?></td><td><?php echo $row['twelvecity']; ?></td><td><?php echo $row['twelveyear']; ?></td><td><?php echo $row['college']; ?></td><td><?php echo $row['collegecity']; ?></td><td><?php echo $row['collegeyear']; ?></td><td><?php echo $row['current']; ?></td><td><?php echo $row['company']; ?></td><td><?php echo $row['currentcity']; ?></td></tr>
            <?php	
		    $c++;
			
		    }
		}
?>
<tbody></table>
<?php
}// end checkcollegelogin
function viewupdateprofile($user_id) {
if(!$this->dbh){
$this->connect();
}
$user_id=$this->dbh->real_escape_string($user_id);
$query="SELECT * FROM profile WHERE user_id=$user_id";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
$result = $result->fetch_array();
if($result)
{
	return $result;
}
}
}//end of viewupdateprofile
public function saveupdateprofile($user_id,$name,$dob,$tenth,$tenthcity,$tenthyear,$twelve,$twelveyear,$twelvecity,$college,$collegecity,$collegeyear,$current,$company,$currentcity,$target_file)	
{
if(!$this->dbh){
$this->connect();
}
$query="UPDATE profile SET name='$name',dob='$dob',tenth='$tenth',tenthcity='$tenthcity',tenthyear='$tenthyear',twelve='$twelve',twelveyear='$twelveyear',twelvecity='$twelvecity',college='$college',collegecity='$collegecity',collegeyear='$collegeyear',current='$current',company='$company',currentcity='$currentcity',photo='$target_file' WHERE user_id='$user_id'";
$result=$this->dbh->query($query);
if($result)
{
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of saveupdateprofile
public function savedonations($user_id,$collegename,$collegecity,$amount,$paytmno,$transactionid,$date)
{
if(!$this->dbh){
$this->connect();
}
$query="INSERT INTO donations(user_id,college_name,college_city,amount,paytm_no,paytm_id,date) VALUES ('$user_id','$collegename','$collegecity','$amount','$paytmno','$transactionid','$date')";
$result=$this->dbh->query($query);
if($result)
{
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of savedonations
public function chathistory($sender_id,$receiver_id)
{
if(!$this->dbh){
$this->connect();
}
$query="SELECT * FROM chats";
$result=$this->dbh->query($query);
$rowcount=$result->num_rows;
if($rowcount>0){
while($row=$result->fetch_assoc())
{
    if($row['sender_id']==$sender_id && $row['receiver_id']==$receiver_id)
	{
     ?>
     <div class="container light">
     <p><?php echo $row['message']; ?></p>
     <span class="time-right"><?php echo $row['time'];?> </span>
     </div>
	<?php
	}
    if($row['receiver_id']==$sender_id && $row['sender_id']==$receiver_id)
	{
     ?>
     <div class="container darker">
    <p class="text-right"><?php echo $row['message']; ?></p>
     <span class="time-left"><?php echo $row['time'];?></span>
    </div>
	<?php
	}	
}	

}
?>
<style>
/* Chat containers */
.container light{
    border: 2px solid #dedede;
    background-color: #448aff;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #00e676;
}

/* Clear floats */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container .img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #aaa;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
}

</style>
<?php	
}//end of chathistory
public function viewdonations($name)
{
	if(!$this->dbh){
$this->connect();
}
	
			$query2="select * from donations where college_name='$name' ";
             $result2=$this->dbh->query($query2);
		?>
		   <div class='table-responsive'><table class='table table-striped'><thead><tr><th>Serial No.</th><th>Student Name</th><th>Amount</th></th><th>Paytm No.</th><th>Paytm Id</th><th>Donation Date</th></thead><tbody>
            <?php
			$c=1;
		while($row=$result2->fetch_assoc())
		{
			$user_id=$row['user_id'];
			$query3="select * from profile where user_id='$user_id' ";
			
            $result3=$this->dbh->query($query3);
			$row2=$result3->fetch_array();
			extract($row2);
			?>
            <tr><td><?php echo $c; ?></td><td><?php echo $row2['name']; ?></td><td><?php echo $row['amount']; ?></td><td><?php echo $row['paytm_no']; ?></td><td><?php echo $row['paytm_id']; ?></td><td><?php echo $row['date']; ?></td></tr>
            <?php
            $c++;			
		}
?>
<tbody></table>
<?php		
}//end of viewdonations
public function savemessage($sender,$receiver,$message)
{
if(!$this->dbh){
$this->connect();
}
$date=date("y/m/d");
$query="INSERT INTO chats(sender_id,receiver_id,message,time) VALUES ('$sender','$receiver','$message','$date')";
$result=$this->dbh->query($query);
if($result)
{
$query2="SELECT * FROM chats";
$result2=$this->dbh->query($query2);
$rowcount=$result2->num_rows;
if($rowcount>0){
while($row=$result2->fetch_assoc())
{
    if($row['sender_id']==$sender && $row['receiver_id']==$receiver)
	{
     ?>
     <div class="container light">
     <p><?php echo $row['message']; ?></p>
     <span class="time-right"><?php echo $row['time'];?> </span>
     </div>
	<?php
	}
    if($row['receiver_id']==$sender && $row['sender_id']==$receiver)
	{
     ?>
     <div class="container darker">
    <p class="text-right"><?php echo $row['message']; ?></p>
     <span class="time-left"><?php echo $row['time'];?></span>
    </div>
	<?php
	}	
}	
}
}
?>
<style>
/* Chat containers */
.container light{
    border: 2px solid #dedede;
    background-color: #448aff;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #00e676;
}

/* Clear floats */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container .img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #aaa;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
}

</style>
<?php	
}//end of savemessages
public function savenewsfeed($news,$target_file)
{
if(!$this->dbh){
$this->connect();
}
$query="INSERT INTO news(photo,newsfeed) VALUES ('$target_file','$news')";
$result=$this->dbh->query($query);
if($result)
{
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of savenewsfeed
public function viewnewsfeed() {
if(!$this->dbh){
$this->connect();
}
	$query2=$query="SELECT * FROM news";
    $result2=$this->dbh->query($query2);
	if(mysqli_num_rows($result2)>0)
  {
	  while($result3 = mysqli_fetch_assoc($result2))
      {
	   	 
?>
<div class="example3">
<div class="row">
<div class="col-md-2">
<p></p>
<a href="<?php echo $result3['photo'];?>"><img src="img/pdf.png" width="100" height="100"></a>
<p>Click On The Image To See document</p>
<p></p>
</div>
<div class="col-md-9">
<p></p><p>News: <?php echo $result3['newsfeed'];?></p>
<?php echo"</div>"."</div>"."</div>"?>
<style>
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
.image {
    border-radius: 50%;
}
</style>
<?php
		
	}		
	
}

}//end of viewnewsfeed
public function saveplacement($year,$target_file,$college)
{
if(!$this->dbh){
$this->connect();
}
$query="INSERT INTO placement(college_name,document,year) VALUES ('$college','$target_file',$year)";
$result=$this->dbh->query($query);
if($result)
{
   $value=1;
}
else
{
	$value=0;
}	
return $value;
}//end of saveplacement
public function viewplacement() {
if(!$this->dbh){
$this->connect();
}
	$query2=$query="SELECT * FROM placement";
    $result2=$this->dbh->query($query2);
	if(mysqli_num_rows($result2)>0)
  {
	  while($result3 = mysqli_fetch_assoc($result2))
      {
	   	 
?>
<div class="example3">
<div class="row">
<div class="col-md-2">
<p></p>
<a href="<?php echo $result3['document'];?>"><img src="img/pdf.png" width="100" height="100"></a>
<p>Click On The Image To See Placement Data</p>
<p></p>
</div>
<div class="col-md-9">
<p></p><p>College Name: <?php echo $result3['college_name'];?></p>
<p></p><p>For Which Year: <?php echo $result3['year'];?></p>
<?php echo"</div>"."</div>"."</div>"?>
<style>
.example3 {
    border: 2px solid blue;
    border-bottom-left-radius: 25px;
	border-bottom-right-radius: 25px;
	border-top-left-radius: 25px;
	border-top-right-radius: 25px;
	border-spacing: 15px;
	padding: 50px;
}
.image {
    border-radius: 50%;
}
</style>
<?php
		
	}		
	
}

}//end of viewplacement
}//end of class

<?php
session_start();
include_once "class.functions.php";
$user_id=$_GET['user_id'];
$table_name="profile";
$obj=new functions();
$obj->viewprofile2($table_name,$user_id,$_SESSION['alumniname']);
?>
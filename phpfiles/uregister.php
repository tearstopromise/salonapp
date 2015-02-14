<?php
/** save codes by loading database module */
include_once("config.php");

/** these headers allow sending data from mobile */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
date_default_timezone_set("Asia/Manila"); 

$datenow= date('Y-m-d').'T'.date('H:i');


/** variables for different data received */
$fname     = $_GET["firstname"];
$lname     = $_GET["lastname"];
$address     = $_GET["address"];
$contact     = $_GET["contact"];
$bdate     = $_GET["bdate"];
$email     = $_GET["email"];
$username  = $_GET["username"];
$password  = $_GET["password"];


/** sql statements go here */
$sql = "INSERT INTO tbl_account (sql_acc_username,sql_acc_password,sql_acc_fname,sql_acc_lname,sql_acc_email,sql_acc_address,sql_acc_bday,type,date)
values('" . $username . "','" . $password . "','" . $fname . "','" . $lname . "','" . $email . "','" . $address . "','', 'member' ,'".$datenow."')";
mysql_query($sql);

/** return a callback to the mobile app */
echo $_GET['callback'] . "(" . json_encode(array(
    "fname" => $fname
)) . ");";

?>
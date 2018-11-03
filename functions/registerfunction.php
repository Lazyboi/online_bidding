<?php

$fname = $_POST ['fname'];
$lname=$_POST['lname'];
$course=$_POST['course'];
$studnum=$_POST['studnumber'];
$caddress = $_POST ['caddress'];
$cnumber = $_POST['cnumber'];
$email = $_POST['email'];

$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
date_default_timezone_set ("Asia/Hong_kong");
mysqli_connect ('localhost','root','') or die  (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect db");


$start= date("F d, Y");

$insert =("INSERT INTO accounts (firstname,lastname,course,studnumber,contactaddress,contactnumber,email,username,password,membersince) values ('$fname','$lname','$course','$studnum','$caddress','$cnumber',
'$email','$username','$password','$start')");

$result =mysqli_query($insert);
if($result === FALSE) {
    die(mysqli_error());
	
}
 Print '<script>alert("Your Account has successfully registered");</script>'; 
Print '<script>window.location.assign("../adminindex.php");</script>'; 




?>

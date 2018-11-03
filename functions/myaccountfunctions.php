<?php
session_start();
$confirm=$_POST['cpassword'];
$password=$_POST['password'];
$current=$_POST['current'];

$user=$_SESSION["username"];
mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");

$select = mysqli_query("select * from accounts where username = '$user'");

$row=mysqli_fetch_array($select);
$currentuser=$row['password'];

if ($current!=$currentuser){
	
	Print '<script>alert("Incorrect Current Password");</script>';
	print '<script>window.location.assign("../myaccount.php");</script>';
}
if ($password ==$confirm){
	
	

$update1 = mysqli_query("update accounts set password ='$confirm' where username = '$user'");
	Print '<script>alert("Password is successfully changed");</script>';
print '<script>window.location.assign("../myaccount.php");</script>';
}else {
	
	Print '<script>alert("Password and Confirm Password is not match");</script>';
	print '<script>window.location.assign("../myaccount.php");</script>';
}
?>
<?php
session_start();
$user=$_SESSION["username"];
$send=$_POST['textarea'];
 date_default_timezone_set ("Asia/Hong_kong");
mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding');

$start= date("l, F d, Y g:i a");

mysqli_query("insert into admin_notif (username,notifications,date) values ('$user','$send','$start')");
 
 Print '<script>alert("Message sent!");</script>';
			Print '<script>window.location.assign("../myaccount.php");</script>'; 

?>
<?php

session_start();
date_default_timezone_set ("Asia/Hong_kong");
mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");

$what=$_SESSION["what"];
$username =$_SESSION["username"];
$select =("select * from accounts where username ='$username'");
$results=mysqli_query($select);

$row =mysqli_fetch_array($results);
$_SESSION["notif"]=$row['notif'];
	
	

	

$updatenotif = mysqli_query("update accounts set notif = 'meron' where username = '$username'");
$updatewishes=mysqli_query("update accounts set wishes = '$what' where username = '$username'");
$notifications = "You added $what item in your wishlist";

	
$start= date("l, F d, Y g:i a");
	
$insertnotif = ("insert into notifications (username,notifications,sender,date,type) values ('$username','$notifications','SYSTEM','$start','wishlist')");
$query1 = mysqli_query($insertnotif);
 if ($query1==false){
	 
	  die (mysqli_error());
 }
 
$updatewishlist =("insert into wishlist (wish,username) values ('$what','$username')");

$query=mysqli_query($updatewishlist);
 if ($query==false){
	 
	  die (mysqli_error());
 }
 

 Print '<script>alert("'.$what.' has been added to your wishlist");</script>';
 Print '<script>window.location.assign("../sales.php");</script>'; 
?>


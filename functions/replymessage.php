	<?php
session_start();
if (isset($_POST['reply'])){
	
	
$name=$_POST['sentto'];
$reply=$_POST['reply'];
$adminname=$_SESSION["name"];
date_default_timezone_set ("Asia/Hong_kong");

mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding');

$start= date("l, F d, Y g:i a");
$admin="ADMIN $adminname";
$message=mysqli_query("INSERT INTO notifications (username,notifications,sender,type,date) values ('$name','$reply','$admin','message','$start')");
$update=mysqli_query("update accounts set notif = 'meron' where username = '$name'");

}
 Print '<script>alert("Message Sent!");</script>';
 Print '<script>window.location.assign("../adminmessages.php");</script>'; 
?>

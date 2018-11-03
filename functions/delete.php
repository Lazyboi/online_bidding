<?php

session_start();

$ID=$_POST['text'];
mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$delete =mysqli_query("delete from notifications where ID= '$ID'");

Print '<script>alert("Item has been deleted");</script>';
Print '<script>window.location.assign("../notif.php");</script>'; 
?>
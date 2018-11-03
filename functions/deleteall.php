
<?php

session_start();
$user=$_SESSION["username"];
$ID=$_SESSION["deletenotif"];
mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$delete =mysqli_query("delete from notifications where username= '$user'");

Print '<script>alert("All notifications has been deleted");</script>';
Print '<script>window.location.assign("../notif.php");</script>'; 
?>

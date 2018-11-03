
<?php

session_start();


mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$delete =mysqli_query("delete from admin_notif");

Print '<script>alert("All notifications has been deleted");</script>';
Print '<script>window.location.assign("../adminmessages.php");</script>'; 
?>

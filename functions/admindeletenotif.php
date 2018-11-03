<?php

session_start();

$delete=$_POST['delete'];
mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$delete =("delete from sell where ID = '$delete'");

$query=mysqli_query($delete);

if ($query==false){
	
	die (mysqli_error());
}
Print '<script>alert("Item has been deleted");</script>';
Print '<script>window.location.assign("../adminnotif.php");</script>';
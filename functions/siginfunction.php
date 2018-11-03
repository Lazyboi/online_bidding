<?php
session_start();
$user=$_POST['username'];
$pass=$_POST['password'];
$con = mysqli_connect('localhost','root','', 'online_bidding');
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");


$select = mysqli_query ($con,"select * from accounts where username = '$user'");


$fetch= mysqli_fetch_array($select);


$fetchuser = $fetch['username'];
$fetchpass = $fetch['password'];





if ($user==$fetchuser &&  $pass==$fetchpass){

$_SESSION["firstname"] = $fetch['firstname'];
$_SESSION["username"] = $fetch['username'];
$_SESSION["usernotif"] = $fetch['username'];
Print '<script>alert("You Login Successfully!");</script>';
Print '<script>window.location.assign("../index.php");</script>'; 
}
else if ($user==$fetchuser || $pass != $fetchpass){
	Print '<script>alert("Incorrect password!");</script>';
	 Print '<script>window.location.assign("../signin.php");</script>'; 	
session_unset();
	session_destroy();
}
else {
	 Print '<script>alert("Incorrect username or password!");</script>'; 
	Print '<script>window.location.assign("../admin.php");</script>'; 	

}


?>

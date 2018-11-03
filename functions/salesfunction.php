<?php 
session_start();

if (isset($_POST['placebid'])){
	$username = $_SESSION["username"];
	$id = $_SESSION["ID"];

$placebid = $_POST['placebid'];

mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");

								  
								  
$select = ("select * from sell where ID = '$id'");
$query = mysqli_query($select);



$row = mysqli_fetch_array($query);
$what=$row['what'];
$_SESSION["whats"]=$row['what'];
$bids=$row['numberofbids'];
$price=$row['price'];
$plusbid = $bids + 1;
$totalprice = $price + $placebid;
$last=$row['lastbidder'];
$user=$row['username'];
$startprice=$row['startprice'];



	if ($username==$user){
	
 Print '<script>alert("You cant bid in your own post.");</script>'; 
 Print '<script>window.location.assign("../sales.php");</script>';
	
}

	
else {
	

if ($placebid>$startprice){
	
     $inert=mysqli_query("insert into $what (bidders) values ('$username')");
	 $update2nd=mysqli_query("update sell set lastlastbidder = '$last' where ID =$id");     
	$updateprice = mysqli_query("update sell set price = '$placebid' where ID = $id");
    $updatebids = mysqli_query("update sell set numberofbids= '$plusbid' where ID = $id");
    $updatelastbidder =mysqli_query("update sell set lastbidder = '$username' where ID = $id");



 Print '<script>alert("You have successfully place your bid");</script>'; 
 Print '<script>window.location.assign("../functions/salesnewdummy.php");</script>'; 




 }
	 

else {
	
 Print '<script>alert("Your bidding price cannot be lower than the minimum bidding price");</script>'; 
 Print '<script>window.location.assign("../functions/salesnewdummy.php");</script>'; 
	 }
	 
	 }
}
 










?>
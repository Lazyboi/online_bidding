<?php

session_start();


$accept=$_POST['accept'];



$con=mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$query=mysqli_query("select * from admin_request where ID = '$accept'",$con);


$row=mysqli_fetch_array($query);
$what = $row['what'];
$username = $row['username'];
$category =$row['category'];
$image=$row['image'];
$image1=$row['image1'];
$image2=$row['image2'];
$quantity = $row['quantity'];
$date=$row['date'];
$time=$row['time'];
$startdate=$row['startdate'];
$startprice=$row['startprice'];	



$insert = mysqli_query("insert into sell (what,username,category,quantity,date,time,startdate,startprice) 
values ('$what','$username','$category','$quantity','$date','$time','$startdate','$startprice')");

$update = mysqli_query("update sell set image= '$image' where what = '$what'");
$update2 = mysqli_query("update sell set image1 = '$image1' where what ='$what'");
$update3=mysqli_query("update sell set image2 = '$image' where what= '$what'");
$deleteall =mysqli_query("delete from admin_request where ID = '$accept'");
$createA=mysqli_query("Create Table $what (ID int,
bidders Varchar(30) not null)");	
if ($insert==false){
	
	die (mysqli_error());
}

else{
	
	
}
Print '<script>alert("Item '.$what.' successfully accepted");</script>';
Print '<script>window.location.assign("../adminrequest.php");</script>'; 
?>


<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/notif.css">

</head>
<body>

<div id = "header">


	<div class = "header-nav">
	
	
	
	<?php
	session_start();
	if (empty($_SESSION)){
		session_unset(); 

session_destroy();
 
	echo"
<ul>
<li class = 'welcome'><a class = 'sign' href = 'signin.php'>Sign in</a> ";
}

else {
	echo "<ul><li class = 'welcome'>Welcome,&nbsp&nbsp<a class = 'name' href = 'myaccount.php'>".$_SESSION['firstname']."</a>&nbsp&nbsp(&nbsp<a class = 'sign' href = 'functions/logout.php'>Sign out</a>&nbsp)</li>";
}	?>

<li><a href = 'index.php' class = "header">Home</a><span class ='divider'> | </span></li>
<?php
if (empty($_SESSION)){
echo "
<li><a href = 'signin.php' class = 'header'>Buy</a><span class ='divider'> | </span></li>";}
else{ echo "<li><a href = 'Categories.php' class = 'header'>Buy</a><span class ='divider'> | </span></li>";
}?>

<?php
if (empty($_SESSION)){
echo "
<li><a href = 'signin.php' class = 'header'>Sell</a><span class ='divider'> | </span></li>";}
else{ echo "<li><a href = 'sell.php' class = 'header'>Sell</a><span class ='divider'> | </span></li>";
}?>
<li><a href = 'help-contact.php' class = "header">Contact&nbspUs</a></li>
<div class="dropdown">

<?php 
if (empty($_SESSION)){
	

	
}
else{
	

$con=mysqli_connect("localhost", "root", "", "online_bidding");
mysqli_select_db($con, 'online_bidding');

	

$user=$_SESSION["username"];

$select =mysqli_query($con, "select * from accounts where username = '$user'");
$row=mysqli_fetch_array($select);

$notif =$_SESSION["notif"]=$row['notif'];

if ($notif=="meron"){
	
	

 echo'	<a href = "notif.php">
<img class = "notif" src = "images/notif.png">
<img class = "notifred" src = "images/notifred.png">

</a>';}

else { 
echo'
	<a href = "notif.php">
<img class ="notif" src = "images/notif.png"></a>';

}
}
?>

   
	
  <div class="dropdown-content">


    <article class = "notif">Notifications</article>
	
  </div>
</div>
</div>
</div>

<div id = "content">
<?php
$user=$_SESSION["usernotif"];
$con=mysqli_connect("localhost", "root", "", "online_bidding");
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");

$updatenotif= mysqli_query($con, "update accounts set notif = 'wala' where username = '$user'");

$selectnotifications=mysqli_query($con, "select * from notifications where username = '$user' ORDER BY id DESC");


while($row=mysqli_fetch_array($selectnotifications)){
	$ID=$_SESSION["deletenotif"]=$row['ID'];
	$row['sender'];
	$_SESSION["notifications"]=$row['notifications'];
	
	
echo '<div class = "all"><div class = "notificate"><ul><li>'.$row['notifications'].'</li></ul><br></div>';
echo '<div class = "delete"><form action = "functions/delete.php" method = "post"><input class ="text" type = "text" name = "text" value = "'.$ID.'"><input class = "delete" type = "submit"  value = "Delete"></form></div>';
echo '<div class = "username">Sent by:'.$row['sender'].'<br></div>';
echo '<div class = "date"><article class ="date">Posted on '.$row['date'].'</article></div></div>';
	
	

}
 

 ?>
<img class = "logo"src = "images/perpetual-logo.png">
<div class = "top-content">
<img class = "unnamed"src = "images/unnamed.png">
<h3 class = "notif">LIST OF NOTIFICATIONS</h3>
<a class ="deleteall" href = "functions/deleteall.php">Delete all notifications</a>
</div>
<div class = "main-content">


<div class = "sub-content">

</div>
</div>
</div>


<div id = "footer">
<a href = "index.php"><img class = "footerlogo" src = "images/logo1.jpg"></a>
<h1 class = "one"> Buying and Selling <br> Online Since 2016</h1>

<div class = "nav-footer">
<h2 class = "comment">Comments from Website</h2>
<h2 class = "links"> Quick Links</h2>
<ul>
<li><a class = "dark" href ="index.php">Home</a></li>
<?php  if (empty($_SESSION)){
	
	echo '
<li><a class = "dark"href ="signin.php">Sell</a></li>';
}
else {
	echo'
	<li><a class = "dark"href ="sell.php">Sell</a></li>';

}
?>
<li><a class = "dark"href ="Categories.php">Buy</a></li>
</ul>
</div>
<p class = "comment"><i>"Just sold an item here. This auction site <br>is so awesome the transaction is fast and easy. <br>I hope more members will use this."</i></p>
<article class = "ramon"><i> - ramon x earl69</i> </article> 
<h2 class = "socialmedia"> Social Medias</h2> 
<ul class = "social">

<li><a href ="http://www.facebook.com"><img class = "social" src = "images/facebook.png"></a></li>
<li><a href ="http://www.twitter.com"><img class = "social" src = "images/twitter.ico"></a></li>
<li><a href ="http://www.googleplus.com"><img class = "social" src = "images/download.jpg"></a></li>
<li><a href ="http://www.pinterest.com"><img class = "social" src = "images/pinterest.png"></a></li>
</ul>

</div>

</body>
</html>


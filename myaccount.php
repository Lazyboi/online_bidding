
<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/myaccount.css">

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
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");

	

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

$user=$_SESSION["username"];
$con=mysqli_connect("localhost", "root", "", "online_bidding");
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");


$select =mysqli_query($con, "select * from accounts where username = '$user'");

$row = mysqli_fetch_array($select);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$since =$row ['membersince'];
$email=$row['email'];
$caddress=$row['contactaddress'];	
$aboutme=$row['aboutme'];
$course=$row['course'];



?>
<img class = "logo"src = "images/perpetual-logo.png">
<div class = "top-content">

<img class = "avatar" src = "images/avatar.png">
<?php   
echo'
<div class= "username"><a href = "myaccount.php"><article class = "username">'.$user.'</a><a href = "myaccount.php"><img class = "usericon" src = "images/Icon-user.png"></a></article></div>';
echo '<article class = "firstname">'.$firstname.'&nbsp'.$lastname.'</article>';
echo '<article class = "since">Member since: '.$since.'</article>';
echo '<article class = "email">Email: '.$email.'</article>';
echo '<article class = "course">'.$course.'</article>';

    ?>
	<form action = "functions/myaccountfunctions.php" method = "post">
<div class = "edit-dropdown">
	<input id="demo" type="checkbox"/>
       <label for="demo" class = "button"><article>Edit Password</article></label>
         <div id="submenu"> 
		    
			
            <article class = "current">Current password</article>
			<article class = "new">New password</article>
			<article class = "cpass">Confirm password</article>
			<input class ="current" type=  "password" name = "current"> 
			
			<input class =  "pass"type=  "password" name = "password"> 
			<input class =  "cpass"type=  "password" name = "cpassword"> 
			
			<input type = "submit" value = "submit" class = "submit">
		 </div>
		 </form>
</div>
</div>

<div class = "mid-content">
<div class = "wishlist">
<article class = "yw">Your Wishlists</article>
<?php
$userwish=$_SESSION["username"];
$con=mysqli_connect("localhost", "root", "", "online_bidding");
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");

$selecta =mysqli_query($con, "select * from accounts where username = '$userwish'");

while ($row=mysqli_fetch_array($selecta)){
	 echo '<div class ="back"><article class = "wishes">'.$row['wishes'].'</article></div>';
	 
}
	
	

 
?>

</div>
<div class = "message">

<form action = "functions/sendadmin.php" method = "post"><article class = "send">Send a message to admin</article>
<textarea name = "textarea" class = "textarea" placeholder = "" style = "overflow-y: hidden; resize:none;"></textarea>
<input type= "submit" class = "sendmess" name ="sendmess" value = "Send"></form>
</div>
</div>
<div class = "spacer">
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


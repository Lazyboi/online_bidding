<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/newbuy.css">
</head>
<body onload="Load()">

<div id = "header">


	<div class = "header-nav">
	
	
	
	<?php
	session_start();
	if (empty($_SESSION)){
		 

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
	

$con = mysqli_connect("localhost","root","", "online_bidding");
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
	<div id= "logo">

<img class = "logo"src = "images/perpetual-logo.png">

</div>
<div id = "sub-content">


</div>


<div id = "upperleft-content">
  <h2 class = "upper"><a class = "niga" href = "index.php">Home</a> > <a class = "niga" href ="Categories.php">All Categories</a> > Gadgets </h2>
</div>

  <div id = "left-content">

  <h3 class = "sub">Sub Categories</h3>
  <ul>
  <li><a href = "Categories.php">Categories</a></li>
  	



  <ul>
  <li><a href= "Books.php">Books</b></li>
  <li><a href= "Gadgets.php" ><font color = "#FA4F4F"><b>Gadgets</b></font></a></li>
  <li><a href= "Uniforms.php" >Uniforms</a></li>
  <li><a href= "Instruments.php" >Instruments</a></li>
  <li><a href= "Physical education needs.php" >Physical education needs</a></li>
  </ul>
 

 
  </div>
  <div id = "buy-top-content">

  <div id = "top-content">
  
  <h4><article class ="photo">Photo</article>
  <article class = "listing">Listing Title</article>
  <article class = "price">Price</article>
  <article class = "seller">Seller</article>
  <article class = "qty">Qty</article>
  <article class = "views">Views</article>
  <article class = "time">Time</article></h4>
   
  
  
  
  </div>
<div id = "buy-content">
<?php

	
$con = mysqli_connect("localhost","root","", "online_bidding");
mysqli_select_db($con, 'online_bidding') or die ("cannot connect to db");



          




                $qry="select * from sell where category = 'Gadgets' ORDER by id desc";
                $result=mysqli_query($con, $qry);
				
				
					if(empty($_SESSION)) {
						     while($row = mysqli_fetch_array($result))

					              {	
					            $ID=$row['ID'];


 
									  $fetchdate = $row['date'];
$fetchtime = $row['time'];
date_default_timezone_set('Asia/Hong_kong');
$future= strtotime($fetchdate.$fetchtime);
$current = time();
$difference = $future - time();
$days = floor($difference / 86400);
$hours = floor(($difference %86400) / 3600);
$minutes = floor ($difference /60);
$r_minutes = floor(($difference % 86400) %3600 / 60 );
$r_seconds = floor ($difference - ($minutes * 60));

                                      $_SESSION["fetchimage"] = $row['image'];
									  $what=$_SESSION["fetchwhat"] = $row['what'];  
					                  $price=$row['price'];
									  $startprice=$row['startprice'];
									  $last=$row['lastbidder'];
									  $lastlast=$row['lastlastbidder'];
									  $usernotif = $row['username'];
                    echo '<div class = "all"><div class = "image"><img class = "imagearray" src="data:image;base64,'. $_SESSION["fetchimage"] = $row['image'].'"><br></div>';
					echo '<div class= "what"><a class = "button"href = "signin.php">'.$row['what'].'</a></div><br>';
					echo '<div class= "price">PH₱ '.$row['startprice'].'</div><br>';
					echo '<div class= "username">'.$row['username'].'</div><br>';
					echo '<div class= "quantity">'.$row['quantity'].'</div><br>';
							echo '<div class= "views">'.$row['views'].'</div><br>';
					if ($current >$future){
						echo '<div class = "time">Sold</div></div>';
						$start= date("l, F d, Y g:i a");
						$message=("You won the bidding item  $what in a price of $price");
						$adminmessage=("$last won the item $what in a price of $price");
						$sellermessage=("Your item $what has been sold to $last in a price of $price");
						$notifications=mysqli_query($con, "update accounts set notif = 'meron' where username = '$last'");
						$notifseller=mysqli_query($con, "update accounts set notif = 'meron' where username = '$usernotif'");
						$notifselleruser=mysqli_query($con, "insert into notifications (username,notifications,sender,type,date) values ('$usernotif','$sellermessage','ADMIN','sold','$start')");
						$notifuser=mysqli_query($con, "insert into notifications (username,notifications,sender,type,date) values ('$last','$message','ADMIN','winner','$start')");
						$notifadmin=mysqli_query($con, "insert into admin_notif (username,notifications,date,lastlastbidder,sender) values ('$last','$adminmessage','$start','$lastlast','SYSTEM')");
						$delete = mysqli_query($con, "delete from sell where id = '$ID'");
						$drop=mysqli_query($con, "DROP TABLE $what");
					}
					else {
						
					
					echo '<div class= "time">&#128336;&nbsp'.$days.'&nbspdays<br>'.$hours.'&nbsphrs<br>'.$r_minutes.'&nbspmins<br>'.$r_seconds.'&nbspsecs<br>.</div><br></div>';
					
				}
					
					}
					
					}
				
									
					else {
				
           
						   while($row = mysqli_fetch_array($result))

					              {
									  
								$price=$row['price'];
								  $bids=$row['numberofbids'];
									$views=$row['views'];
									$ID=$row['ID'];
									
									  $startprice=$row['startprice'];
								
									
									

 
									  $fetchdate = $row['date'];
$fetchtime = $row['time'];
date_default_timezone_set('Asia/Hong_kong');
$future= strtotime($fetchdate.$fetchtime);
$current = time();
$difference = $future - time();
$days = floor($difference / 86400);
$hours = floor(($difference %86400) / 3600);
$minutes = floor ($difference /60);
$r_minutes = floor(($difference % 86400) %3600 / 60 );
$r_seconds = floor ($difference - ($minutes * 60));
             
                                      $_SESSION["fetchimage"] = $row['image'];
									  $what=$_SESSION["fetchwhat"] = $row['what'];  
					                  $last=$row['lastbidder'];
									  $lastlast=$row['lastlastbidder'];
									  $usernotif = $row['username'];
                    echo '<div class = "all"><div class = "image"><img class = "imagearray" src="data:image;base64,'. $_SESSION["fetchimage"] = $row['image'].'"><br></div>';
					echo '<div class= "what"><form action = "sales.php" method = "POST"><input type = "text" name = "id" value = "'.$ID.'"><input type = "text" name = "bids" value = "'.$bids.'"><button class = "button" name = "what">'.$row['what'].'</button></a></div><br>';
					echo '<div class= "price"><input type = "text" name = "price" value = "'.$startprice.'">PH&#8369; '.$startprice.'</div><br>';
					echo '<div class= "username">'.$row['username'].'</div><br>';
					echo '<div class= "quantity">'.$row['quantity'].'</div><br>';
					echo '<div class= "views"><input type = "text" name = "views" value = "'.$views.'">'.$row['views'].'</div><br></form>';
						if ($current >$future){
						echo '<div class = "time">Sold</div></div>';
						$start= date("l, F d, Y g:i a");
						$message=("You won the bidding item  $what in a price of $price");
						$adminmessage=("$last won the item $what in a price of $price");
						$sellermessage=("Your item $what has been sold to $last in a price of $price");
						$notifications=mysqli_query($con, "update accounts set notif = 'meron' where username = '$last'");
						$notifseller=mysqli_query($con, "update accounts set notif = 'meron' where username = '$usernotif'");
						$notifselleruser=mysqli_query($con, "insert into notifications (username,notifications,sender,type,date) values ('$usernotif','$sellermessage','ADMIN','sold','$start')");
						$notifuser=mysqli_query($con, "insert into notifications (username,notifications,sender,type,date) values ('$last','$message','ADMIN','winner','$start')");
						$notifadmin=mysqli_query($con, "insert into admin_notif (username,notifications,date,lastlastbidder,sender) values ('$last','$adminmessage','$start','$lastlast','SYSTEM')");
						$delete = mysqli_query($con, "delete from sell where id = '$ID'");
						$drop=mysqli_query($con, "DROP TABLE $what");
					}
					else {
						
					
					echo '<div class= "time">&#128336;&nbsp'.$days.'&nbspdays<br>'.$hours.'&nbsphrs<br>'.$r_minutes.'&nbspmins<br>'.$r_seconds.'&nbspsecs<br>.</div><br></div>';
					
				}
					
             
				
									  }
                }
                  
				


?>
	</div>
	</div>
	<div id = "spacer">
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
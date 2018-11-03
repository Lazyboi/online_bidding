
<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/adminrequest.css">

   


</head>

<body onLoad="Load()">



<div id = "header">


	<div class = "header-nav">
	
	
	
	<?php
	session_start();
	if (empty($_SESSION)){
		session_unset(); 

session_destroy();
 
	echo"
<ul>
<li class = 'welcome'><a class = 'sign' href = 'signin.php'>Sign in</a><span class ='or'> or  <a class = 'sign' href = 'register.php'>register</a></li> ";
}

else {
	echo "<ul><li class = 'welcome'>Welcome Admin,&nbsp&nbsp<a class = 'name' href = '#'>".$_SESSION['name']."</a>&nbsp&nbsp(&nbsp<a class = 'sign' href = 'functions/logout.php'>Sign out</a>&nbsp)</a><span class ='or'> 
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


	<a class = 'sign' href = 'register.php'>Register for user</a></li>";
}	?>




   
	

	

</div>
</div>
</div>

<div id = "content">



<img class = "logo"src = "images/perpetual-logo.png">

<?php

mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");



$selectnotifications=mysqli_query($con, "select * from admin_request ORDER BY id DESC");


while($row=mysqli_fetch_array($selectnotifications)){
	$ID=$row['ID'];
	$_SESSION["users"]=$row['username'];
	$_SESSION["what"]=$row['what'];
   $image1= $row['image1'];
	$image2=$row['image2'];
	$image=$row['image'];
	



echo '<div class = "all"><div class = "username">Sent by:'.$row['username'].'<br></div>';
echo '<div class = "notificate"><ul><li>'.$row['what'].'</li></ul><br></div>';
echo '<div class = "delete"><form action ="functions/adminrequestdelete.php" method = "POST"><input class = "text" type= "text" name = "delete" value = "'.$ID.'"><button  class = "delete">Decline</button></form></div>';
echo '<div class = "category"><article class ="category">Category: '.$row['category'].'</article></div>';
echo '<div class = "qty"><article class ="qty">Quantity:'.$row['quantity'].'</article></div>';
echo '<div class = "startprice"><article class ="startprice">&#9921; PH₱: '.$row['startprice'].'</article></div>';
echo '<div class = "date"><article class ="date">Posted on '.$row['startdate'].'</article></div>';
echo '<div class = "startdate"><article class ="startdate">End date: '.$row['date'].' &nbsp End time:'.$row['time'].'</article></div>';
echo '<link rel="stylesheet type = "text/css" href="css/thumbnail.css">
<div class="container">
    <a  >
        <img class="thumb1"  src="data:image;base64,'.$row['image'].'">
        <img class="big"  src="data:image;base64,'.$row['image'].'">
    </a>
 
    <a >
        <img class="thumb2" src="data:image;base64,'.$row['image1'].'">
        <img class="big"  src="data:image;base64,'.$row['image1'].'">
    </a>
 
    <a  >
        <img class="thumb3" src="data:image;base64,'.$row['image2'].'">
        <img class="big"  src="data:image;base64,'.$row['image2'].'">
    </a>
 

 
    <a href="#">
        <img class="big featured"  src="data:image;base64,'.$row['image'].'">
    </a>
</div>';	
echo '<div class = "accept"><form action ="functions/acceptrequest.php" method = "POST"><input class="text" type= "text" name = "accept" value = "'.$ID.'"><button  class = "accept">Accept</button></form></div></div>';

}


 ?>




<div class = "mid-content">
<img class = "unnamed"src = "images/requestred.png">
<h3 class ="notif">LIST OF REQUEST</h3>	
<a class ="deleteall" href = "#openModal">Delete all requests</a>
	



<div id="openModal" class="modalDialog">
				<div>	<a href="#close">  <span class="close">x</span></a>

						<div class = "top-modal">
				        <article class = "AS">Are you sure you want to delete all the requests? </article> 
	
						</div>
						<div class = "mid-modal">
						<a class = "yes" href = "functions/adminrequestdeletetall.php">YES</a>
						<a class = "cancel" href = "#close">CANCEL</a>
						</div>
					
				</div>
				</div>

</div>

<div class = "top-content">
<ul>
  <li class ="home"><a href = "adminindex.php"><img class = "home" src = "images/home.png"></a></li>
  <li class ="request"><a href = "adminrequest.php"><img class = "request" src = "images/request.png"></a></li>
  <li class ="message"><a href = "adminmessages.php"><img class ="message" src = "images/message.png"></a></li>
    <li class ="message"><a href = "adminnotif.php"><img class ="message" src = "images/item.png"></a></li>
</ul>
</div>




<div class = "main-content">


</div>
</div>

<div id = "footer">
<a href = "index.php"><img class = "footerlogo" src = "images/logo1.jpg"></a>
<h1 class = "one"> Buying and Selling <br> Online Since 2016</h1>

<div class = "nav-footer">
<h2 class = "comment">Comments from Website</h2>
<h2 class = "links"> Quick Links</h2>
<ul>
<li><a class = "dark" href ="#">Home</a></li>
<?php  if (empty($_SESSION)){
	
	echo '
<li><a class = "dark"href ="#">Sell</a></li>';
}
else {
	echo'
	<li><a class = "dark"href ="#">Sell</a></li>';

}
?>
<li><a class = "dark"href ="#">Buy</a></li>

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


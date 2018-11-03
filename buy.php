<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/buy.css">

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
<li><a class = 'sign' href = 'signin.php'>Sign in</a> ";
}

else {
	echo "<ul><li>Welcome,&nbsp&nbsp<a class = 'name' href = '#'>".$_SESSION['firstname']."</a>&nbsp&nbsp(&nbsp<a class = 'sign' href = 'functions/logout.php'>Sign out</a>&nbsp)<span class ='divider'> | </span></li>";
}	?>
<li><a href = 'index.php'>Home</a><span class ='divider'> | </span></li>
<?php
if (empty($_SESSION)){
echo "
<li><a href = 'signin.php'>Buy</a><span class ='divider'> | </span></li>";}
else{ echo "<li><a href = 'Categories.php'>Buy</a><span class ='divider'> | </span></li>";
}?>

<?php
if (empty($_SESSION)){
echo "
<li><a href = 'signin.php'>Sell</a><span class ='divider'> | </span></li>";}
else{ echo "<li><a href = 'sell.php'>Sell</a><span class ='divider'> | </span></li>";
}?>

<li><a href = 'help-contact.php'>Help & Contact</a></li>
<input class = 'real'type='text' name='search' placeholder='Search..'>








<select class = "categories">
<option>All Categories</option>
<option>Art</option>
<option>Antiques</option>
<option>Baby</option>
<option>Books</option>
<option>Cameras & Photo</option>
<option>Cellphone & Accesories</option>
<option>Coins & Paper money</option>
<option>Collectibles</option>
</select>
<button class = "Search_button">Search </button>
</ul>	
</div>
</div>
<div id = "content">

<div id = "background">
<div class = "main-content">
<h1 class = "all">All Categories</h1>
<h2 class = "motors">Motors </h2>
<h4 class = "Cars">Cars & Trucks</h4>
<h4 class= "Motorcycles ">Motorcycles</h4>
<h4 class= " Parts">Parts & Accesories</h4>
<h4 class= "Auto">Auto Tools & Supplies</h4>
<h4 class= "Vehicles">Vehicles</h4>
<h2 class = "fashion">Fashion</h2>
<h4 class= "Women">Women's Clothing</h4>
<h4 class= "Men">Men's Clothing</h4>
<h4 class= "Kids">Kids & Baby</h4>
<h4 class= "Jewelry">Jewelry</h4>
<h4 class= "HandBags">HandBags & Accessories</h4>
<h2 class = "electronics">Electronics</h2>
<h4 class= "Cells">Cells Phones & Accessories</h4>
<h4 class= "Camera">Camera & Photo</h4>
<h4 class= "Computer">Computer & Tablets</h4>
<h4 class= "Video">Video Games & Consoles/h4>
<h4 class= "TV,">TV, Audio & Surveillance</h4>
<h2 class = "arts">Collectibles & Arts </h2>
<h4 class= "Collectibles">Collectibles</h4>
<h4 class= "Coins">Coins & Paper Money</h4>
<h4 class= "Sports">Sports Memorabilla</h4>
<h4 class= "Gallery">Gallery Collective</h4>
<h4 class= "Antiquies">Antiquies</h4>
<h2 class = "home">Home & Garden</h2>
<h4 class= "">Crafts</h4>
<h4 class= "Home">Home Decor</h4>
<h4 class= "Pet">Pet Supplies</h4>
<h4 class= "Kitchen">Kitchen, Dining & Bar</h4>
<h4 class= "Yard">Yard, Garden & Outdoor</h4>
<h2 class = "sports">Sporting Goods</h2>
<h4 class= "Cycling">Cycling</h4>
<h4 class= "Golf">Golf</h4>
<h4 class= "Hunting">Hunting</h4>
<h4 class= "Fitness">Fitness & Running</h4>
<h4 class= "Fishing">Fishing</h4>
<h2 class = "toys">Toys & Hobbies </h2>
<h4 class= "Action">Action Figures</h4>
<h4 class= "LEGO ">LEGO & Building Toys</h4>
<h4 class= "Railroads">Railroads & Trains</h4>
<h4 class= "Radio">Radio Control Toys</h4>
<h4 class= "Preschool">Preschool & Pretend Play</h4>	


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
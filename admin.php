<html>
<head>
<link rel="stylesheet type = "text/css" href="css/signin.css">

</head>

<body>
<form action = "functions/adminfunction.php" method = "POST">

<div id = "content">

<img class = "logo"src = "images/perpetual-logo.png">
<label class = "admin">
<a href = "signin.php"><img class = "user" src = "images/user.png"></a>
<a class ="admin" href = "signin.php">CLICK TO SIGN IN AS USER</a>
</label>
<div class = "top">
<h4 class = "dont">Home</h4><a  class = "dont" href = "index.php">Back</a> 
<h2 class = "signup">Admin Login</h2>

<article class = "free"> It's Free to Register in this website, Register Now!</article>
</div>
<div id ="contentmid">
<div class = "maincontent">
<article class = "user">Admin Username </article>
<input type = "textbox" name = "username" placeholder = "Email or Username" required = "required">
<article class = "pass">Admin Password </article>
<input type = "password" name = "password" placeholder = "Password" required = "required">
<button> Login </button> 
<a class ="terms" href = "#openModal">Terms and Conditions</a>
	



<div id="openModal" class="modalDialog">
				<div>	<a href="#close">  <span class="close">x</span></a>

						<div class = "top-modal">
				        <article class = "AS"></article> 
	
						</div>
						<div class = "mid-modal">
						<h5 class = "terms">Terms and Conditions</h5>
						<p>1. The seller must only sell items that are already used(secondhand).
						<p>2. The seller must post only items that are related to academic and extra-curricular activities.
						<p>3. The transaction must be done only inside the university.
						<a class = "cancel" href = "#close">I agree and have read the terms and conditions</a>
						</div>
					
				</div>
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
	</div>

	
</body>
</html>

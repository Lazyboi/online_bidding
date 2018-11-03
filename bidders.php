<html>
<head>
<link rel="stylesheet type = "text/css" href="css/bidders.css">
</head>

<body>
<form action = "functions/siginfunction.php" method = "POST">

<div id = "content">

<img class = "logo"src = "images/perpetual-logo.png">

<div class = "top">
<h4 class = "dont">Admin Home</h4><a  class = "dont" href = "adminnotif.php">Back</a> 
<h2 class = "signup">LIST OF BIDDERS</h2>
<img class = "unnamed"src = "images/firstred.png">

</div>
<div id ="contentmid">
<div class = "maincontent">
<?php
if(isset($_POST['ID']))
{
	

$bidders=$_POST['ID'];

mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$selectnotifications=mysqli_query("select * from sell where ID = '$bidders'");

 
$row=mysqli_fetch_array($selectnotifications);

	$what=$row['what'];


	$select=mysqli_query("select * from $what");
	
	
	
	if ($select==true){
		
		

	while ($fetch=mysqli_fetch_array($select)){
		$fetchid=$fetch['ID'];
		$fetchuser=$fetch['bidders'];
		echo'
		<h5>Item name: '.$what.'</h5>
		<ul>
		<li>'.$fetchid.'.) '.$fetchuser.'</li>
		</ul>
		
		';
	}
		}
		else {
			
			
			echo'<article class = "this">This Item still has no bidder</article>
			';
		}
		
}
?>


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

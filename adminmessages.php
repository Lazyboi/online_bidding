
<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/adminmessages.css">



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


	<a class = 'sign' href = 'register.php'>Register for user</a></li>";}	?>




   
	

	

</div>
</div>
</div>

<div id = "content">



<img class = "logo"src = "images/perpetual-logo.png">

<?php

mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");


$selectnotifications=mysqli_query("select * from admin_notif ORDER BY id DESC");


while($row=mysqli_fetch_array($selectnotifications)){
	$ID=$row['ID'];
	$_SESSION["users"]=$row['username'];
	
echo '<div class = "all"><div class = "username">Sent by:'.$row['sender'].'<br></div>';
echo '<div class = "notificate"><ul><li>'.$row['notifications'].'</li></ul><br></div>';
echo '<div class = "lastlast"><article class = "lastlast">Runner up:'.$row['lastlastbidder'].'<br></div>';
echo '<div class = "delete"><form action ="functions/admindelete.php" method = "POST"><input class = "text" type= "text" name = "delete" value = "'.$ID.'"><button  class = "delete">Delete</button></form></div>';
echo '<div class = "date"><article class ="date">Posted on '.$row['date'].'</article></div></div>';



}
 

 ?>
<button class= "reply" id="myBtn">Send a message</button>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
	  <form action = "functions/replymessage.php" method = "post">
      <h2>Send a message to: <input class = "sentto" type = "textbox" name = "sentto"></h2>
    </div>
    <div class="modal-body">
	
      <p><textarea name = "reply" style = "resize:none;"></textarea></p>
	  
      <p><input type = "submit" class = "submit" name ="submit"></p>
	  </form>
    </div>
    <div class="modal-footer">
      <h3><?php echo 'From: ADMIN '.$_SESSION["name"].'';?> </h3>
    </div>
  </div>

</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<div class = "mid-content">
<img class = "unnamed"src = "images/message-icon.png">
<h3 class ="notif">LIST OF MESSAGES</h3>	
	<a class ="deleteall" href = "functions/admindeleteall.php">Delete all notifications</a>
</div>

<div class = "top-content">
<ul>
  <li class ="home"><a href = "adminindex.php"><img class = "home" src = "images/home.png"></a></li>
  <li class ="request"><a href = "adminrequest.php"><img class = "request" src = "images/request.png"></a></li>
  <li class ="message"><a href = "adminmessages.php"><img class ="message" src = "images/message.png"></a></li>
  <li class ="request"><a href = "adminnotif.php"><img class ="notif" src = "images/item.png"></a></li>
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/sell.css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/favicon.ico">
<?php session_start();?>
</head>

<body>
<div  id = "content">
<img class = "logo"src = "images/perpetual-logo.png">
<div id = "content-top">
<h4 class = "dont">Home</h4><a  class = "dont" href = "index.php">Back</a> 
<h2> Sell</h2>
<article class = "there"> There are more than 10,000 bidders in this site</article>
</div>
<div id = "content-mid">



<form action = "functions/sellfunction.php" method = "POST" enctype ="multipart/form-data">
<table border=0 cellpadding="1" cellspacing="1" id="select">
<tr>
<td class = "what"> What are you selling?</td>
<td><input class = "what" type ="textbox" name = "what" required = "required"></td>
</tr>
<tr class="select_row">


<td class = "category">Choose a category </td>
<td>	
<select id="select_id" name = "category" required = "required">
<option>Select Categories</option>
<option value = "Books">Books</option>
<option value = "Gadgets">Gadgets</option>
<option value = "Uniforms">Uniforms</option>
<option value = "Instruments">Instruments</option>
<option value = "Physical education needs">Physical education needs</option>
</select>
</td>
</tr>
<tr>
<td class = "qty">Quantity</td>
<td><input type = "number" name = "qty" class = "qty" required = "required"></td>
</tr>
<td class = "startprice">Starting Price</td>
<td><input type = "number" name = "startprice" class = "startprice" required = "required"></td>
</tr>
<tr>
<td class = "upload">Upload Photos</td>
<td class = "uploadicon1"><label><img class = "upload" src = "images/add_file.png"><input class ="image1"type = "file" name = "image" required = "required" multiple accept='image/*'></label></td>
<td class = "uploadicon2"><label><img class = "upload1" src = "images/add_file.png"><input class ="image2"type = "file" name = "image1" required = "required" multiple accept='image/*'></label></td>
<td class = "uploadicon3"><label><img class = "upload2" src = "images/add_file.png"><input class = "image3"type = "file" name = "image2" required = "required" multiple accept='image/*'></label></td>

</tr>
<tr>
<td class= "image1">Image 1</td>
<td class ="image2">Image 2</td>
<article class ="image3">Image 3</article>
<article class = "note"> Note: &nbspImage 1 will be your main image. </article>
</tr>
<tr>
<td class = "date">Set Date</td>
<td><input id = "date"  name = "date" type = "date" required = "required"></td>
</tr>

<tr>
<td class = "time">Set Time</td>
<td><input id = "time"  name = "time" type = "time" required = "required"></td>
</tr>
<tr>
<td class = "submit"><input type= "submit" name = "sumit" value ="Submit ">
</tr>
</table>
</form>
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
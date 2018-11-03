
<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/sales.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>

 <script >
$(document).ready(function () {
    setInterval(function () {
        $("#").load("sales.php");
    }, 1000);
});
</script>
  <script type="text/javascript">
   

        //ok , it's working , we are done , if you want to add imgs you have to :

        //1 - add an img tag with id : Img++; ex:  <img id="Img4" src="IMG/1.jpg"/>
        //2 - add an li tag  with id : S++;   ex:  <li id="S4"></li>
        //3 - add an p tag with id : SP++;    ex:  <p id="SP4"></p>
        //4 - change the value of nrImg 

        var nrImg = 3;  //the number of img , I only have 3 
        var IntSeconds = 30;     //the seconds between the imgs

        function Load()
        {
            nrShown = 0;    //the img visible
            Vect = new Array(nrImg + 10);
            Vect[0] = document.getElementById("Img1");
            Vect[0].style.visibility = "visible";

            document.getElementById("S" + 0).style.visibility = "visible";

            for (var i = 1; i < nrImg; i++)
            {
                Vect[i] = document.getElementById("Img" + (i + 1));
                document.getElementById("S" + i).style.visibility = "visible";
            }

            document.getElementById("S" + 0).style.backgroundColor = "rgba(255, 255, 255, 0.90)";
            

            mytime = setInterval(Timer, IntSeconds * 1000);
        }
        function Timer()
        {
            nrShown++;
            if (nrShown == nrImg)
                nrShown = 0;
            Effect();
        }
        //next img
        function next()
        {
            nrShown++;
            if (nrShown == nrImg)
                nrShown = 0;
            Effect();

            clearInterval(mytime);
            mytime = setInterval(Timer, IntSeconds * 1000);
        }
        function prev()
        {
            nrShown--;
            if (nrShown == -1)
                nrShown = nrImg -1;
            Effect();

            clearInterval(mytime);
            mytime = setInterval(Timer, IntSeconds * 1000);
        }
        //here changes the img + effect
        function Effect()
        {
            for (var i = 0; i < nrImg; i++)
            {
                Vect[i].style.opacity = "0";   //to add the fade effect
                Vect[i].style.visibility = "hidden";

                document.getElementById("S" + i).style.backgroundColor = "rgba(0, 0, 0, 0.70)";
               
            }
            Vect[nrShown].style.opacity = "1";
            Vect[nrShown].style.visibility = "visible";
            document.getElementById("S" + nrShown).style.backgroundColor = "rgba(255, 255, 255, 0.90)";
            
        }

    </script>
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
	

mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding');

	

$user=$_SESSION["username"];

$select =mysqli_query("select * from accounts where username = '$user'");
$row1=mysqli_fetch_array($select);

$notif =$_SESSION["notif"]=$row1['notif'];

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

	<?php


if (isset($_POST['id'])){
	

$what = $_POST['id'];
$_SESSION["price"]=$_POST['price'];
$_SESSION["views"]=$_POST['views'];
$_SESSION["bids"]=$_POST['bids'];
mysqli_connect('localhost','root','') or die (msql_error());
mysqli_select_db('online_bidding') or die (" cannot connect to db");

$select =("select * from sell where ID = $what");
$result = mysqli_query($select);

$row=mysqli_fetch_array($result);
$_SESSION["what"]=$row['what'];
$_SESSION["user"]=$row['username'];
$_SESSION["qty"]=$row['quantity'];
$_SESSION["choosecategory"]=$row['choosecategory'];
$_SESSION["category"]=$row['category'];
$_SESSION["image1"]=$row['image'];
$_SESSION["image2"]=$row['image1'];
$_SESSION["image3"]=$row['image2'];
$_SESSION["startdate"]=$row['startdate'];
$_SESSION["date"]=$row['date'];
$_SESSION["time"]=$row['time'];
$_SESSION["ID"]=$row['ID'];
$fetchdate=$row['date'];
$fetchtime=$row['time'];
$_SESSION["notifications"]=$_SESSION['notif'];
$views = $row['views'] + 1;	
$updateviews =mysqli_query("update sell set views = '$views' where ID = $what");
$future= strtotime($fetchdate.$fetchtime);

$_SESSION["close"]= date("l, F d, Y g:i a", $future);
	$username = $_SESSION["user"];
	$yea =("select * from accounts where username= '$username'");
	
	$yearesults = mysqli_query($yea);
	
$fetch=mysqli_fetch_array($yearesults);
$_SESSION["location"]=$fetch['contactaddress'];
	} 
?>



<div id = "content">
<div id= "logo">

<img class = "logo"src = "images/perpetual-logo.png">

</div>
<div id ="content2">
	<div class = "mid-content">
	
	<form action = "functions/salesfunction.php" method ="POST">
<h3 class = "what"><?php echo $_SESSION["what"]; ?> </h3> 
<h3 class ="price">Minimum Bid Price:</h3><h4 class ="price">PH&#8369; <?php echo $_SESSION["price"];?></h4>
<input class = "placebid" type = "number" name ="placebid" placeholder = "Place your bid here" required= "required">
<button class = "placebid">PLACE BID</button>
<a href = "functions/wishlist.php"
class = "wish">ADD TO WISH LIST</a>


</div>

<div class = "line">
</div>
<div class = "next-content">


<article class = "seller">&#9654&nbsp&nbsp Seller:&nbsp<?php echo $_SESSION["user"];?> </article>
<article class = "qty">&#9654&nbsp&nbsp Quantity:&nbsp<?php echo $_SESSION["qty"];?> </article>
<article class  = "views">&#9654&nbsp&nbsp Views:&nbsp<?php echo $_SESSION["views"];?> </article>
<article class ="location">&#9654&nbsp&nbsp Location:&nbsp<?php echo $_SESSION["location"];?> </article>


<article class ="bids">&#9654&nbsp&nbsp Number of Bids:&nbsp<?php echo $_SESSION["bids"];?> </article>
<article class = "start">&#9654&nbsp&nbsp Start:&nbsp <?php echo $_SESSION["startdate"];?></article>
<article class = "close">&#9654&nbsp&nbsp Close:&nbsp <?php echo $_SESSION["close"];?></article>
<article class = "remaining">&#9654&nbsp&nbsp Remaining:&nbsp <?php
date_default_timezone_set('Asia/Hong_kong');
$future= strtotime($_SESSION["date"].$_SESSION["time"]);
$current = time();
$difference = $future - time();
$days = floor($difference / 86400);
$hours = floor(($difference %86400) / 3600);
$minutes = floor ($difference /60);
$r_minutes = floor(($difference % 86400) %3600 / 60 );
$r_seconds = floor ($difference - ($minutes * 60));


echo '&#128336;&nbsp<b>'.$days.'</b>&nbspdays&nbsp<b>'.$hours.'</b>&nbsphrs&nbsp<b>'.$r_minutes.'</b>&nbspmins&nbsp<b>'.$r_seconds.'</b>&nbspsecs';
?>
</article>

</form>
</div>
</div>
<div id = "main-content"><?php
$category = $_SESSION["category"].".php";

?>

<div class = "top-content">
 <h3 class ="top"><a class = "niga" href = "index.php">Home</a> > <a class = "niga" href = "Categories.php">All Categories</a> > <?php echo '<a class = "niga" href ="'.$_SESSION["category"].'.php">'.$_SESSION["category"].'</a>';  ?> > <?php echo $_SESSION["what"];?></h3>
 </div>

</div>


    <div id="slider">

        <div id="imgs">
            <!-- here you have to add the img tag -->
            <a href = "#"><?php echo '<img id = "Img1"class = "imagearray" src="data:image;base64,'.$_SESSION["image1"].'">';?></a>
            <a href = "#"><?php echo '<img id = "Img2"class = "imagearray" src="data:image;base64,'.$_SESSION["image2"].'">';?></a>
           <a href = "#"><?php echo '<img id ="Img3"class = "imagearray" src="data:image;base64,'.$_SESSION["image3"].'">';?></a>
        </div>
        <!--Here is going to be the left right buttons, the info and the imgs shown-->
        <div id="Snav">
            <!-- here is the circles , showes the current img -->
            <div id="SnavUp">
                <div id="Scircles">
                    <ul>
                        <!-- here you have to add the li tag-->
                        <li id="S0"></li>
                        <li id="S1"></li>
                        <li id="S2"></li>
                    </ul>
			
                </div>
            </div>
          
         		  <!-- the left and right button -->
            <div id="SnavMiddle">
                <img id="Sleft" src="images/sleft.png" onclick="prev()"/>
                <img id="Sright" src="images/sright.png" onclick="next()"/>
            </div>
            <!-- the info -->
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



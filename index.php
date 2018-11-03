<html>
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/styles.css">
  <script type="text/javascript">
   

        //ok , it's working , we are done , if you want to add imgs you have to :

        //1 - add an img tag with id : Img++; ex:  <img id="Img4" src="IMG/1.jpg"/>
        //2 - add an li tag  with id : S++;   ex:  <li id="S4"></li>
        //3 - add an p tag with id : SP++;    ex:  <p id="SP4"></p>
        //4 - change the value of nrImg 

        var nrImg = 3;  //the number of img , I only have 3 
        var IntSeconds = 4;     //the seconds between the imgs

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
	

mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding');

	

$user=$_SESSION["username"];

$select =mysqli_query("select * from accounts where username = '$user'");
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

  
<img class = "logo" src = "images/perpetual-logo.png">


<div class = "line1">
<div class = "line2">
</div>
</div>
<div class = "main">
<div class = "nav">
<ul>


<li>
<a class = "blue" href ="Books.php">BOOKS</a>
<ul>
<li><a href = "Books.php"><img class ="navpics"  src = "images/books.jpg"></li>
</ul>

</li>
<li>
<a class = "blue" href ="Gadgets.php">GADGETS</a>
<ul>

<li><a href = "Gadgets.php"><img class ="navpics"  src = "images/gadgets.jpg"></li>
</ul>
</li>
<li>
<a class = "blue" href ="Uniforms.php">UNIFORMS</a>
<ul>
<li><a href = "Uniforms.php"><img class ="navpics"  src = "images/uniform.jpg"></li>
</ul>
</li>
<li>
<a class = "blue" href ="Instruments.php">INSTRUMENTS</a>
<ul>
<li><a href = "Instruments.php"><img class ="navpics"  src = "images/instruments.jpg"></li>

</ul>

</li>
<li>
<a class = "blue" href ="Physical education needs.php">PHYSICAL EDUCATION NEEDS</a>
<ul>

<li><a href = "Physical education needs.php"><img class ="navpics"  src = "images/pe.jpg"></li>
</ul>
</li>
</ul>

</div>
</div>


    <div id="slider">
        <div id="imgs">
            <!-- here you have to add the img tag -->
            <a href = "#"><img id="Img3" src="images/perps1.jpg"/></a>
            <a href = "#"><img id="Img2" src="images/perps2.jpg"/></a>
           <a href = "#"><img id="Img1" src="images/perps3.jpg"/></a>
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
<div class = "line3">

</div> 
<div class = "line4">
</div>
	
	<a href= "#"><img class = "buy" src = "css/buy.jpg"></a>
    <a href ="#"><img class = "sell" src = "css/sell.jpg"></a>
		<div class = "space">
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
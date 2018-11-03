
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>
</title>
<link rel="stylesheet type = "text/css" href="css/admintext.css">


</head>
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



$selectnotifications=mysqli_query("select * from admin_request ORDER BY id DESC");


while($row=mysqli_fetch_array($selectnotifications)){
	$ID=$row['ID'];
	$_SESSION["users"]=$row['username'];
	$_SESSION["what"]=$row['what'];
   $image1= $row['image1'];
	$image2=$row['image2'];
	$image=$row['image'];

echo '


    <div id="slider">
        <div id="imgs">
            <!-- here you have to add the img tag -->
           
			<img id = "Img1" class = "imagearray" src="data:image;base64,'.$row['image'].'">
			<img id = "Img2" class = "imagearray" src="data:image;base64,'.$row['image1'].'">
			<img id = "Img3" class = "imagearray" src="data:image;base64,'.$row['image2'].'">
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
	';





}



 ?>



<div class = "top-content">
<ul>
  <li class ="home"><a href = "adminindex.php"><img class = "home" src = "images/home.png"></a></li>
  <li class ="request"><a href = "adminrequest.php"><img class = "request" src = "images/request.png"></a></li>
  <li class ="message"><a href = "adminmessages.php"><img class ="message" src = "images/message.png"></a></li>
</ul>
</div>




<div class = "main-content">


</div>
</div>


</body>
</html>


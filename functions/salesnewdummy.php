<html>
<head>

<title>
</title>


</head>
<body onload="Load()">


  
  

<form action = "sales.php" method = "POST">
<?php

		session_start();

mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding') or die ("cannot connect to db");



          

$what=$_SESSION["whats"];


                $qry="select * from sell where what = '$what'";
                $result=mysqli_query($qry);
				
	
				
           
						   while($row = mysqli_fetch_array($result))

					              {
									  
									
									$_SESSION["bids"]=$row['numberofbids'];
									$_SESSION["views"]=$row['views'];
                            Print '<script>window.location.assign("../sales.php");</script>'; 
                }
                  
				  	


?>

</form>

</body>
</html>
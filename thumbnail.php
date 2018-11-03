

<?php

mysqli_connect('localhost','root','') or die (mysqli_error());
mysqli_select_db('online_bidding') or die ("cannot connect to db");



$selectnotifications=mysqli_query("select * from sell ORDER BY id DESC");


while($row=mysqli_fetch_array($selectnotifications)){

   $image1= $row['image1'];
	$image2=$row['image2'];
	$image=$row['image'];
	
	
	echo'
<link rel="stylesheet type = "text/css" href="css/thumbnail.css">
<div class="container">
    <a href="#" class = "one">
        <img class="thumb" src="data:image;base64,'.$row['image'].'">
        <img class="big"  src="data:image;base64,'.$row['image'].'">
    </a>
 
    <a href="#" class = "two">
        <img class="thumb" src="data:image;base64,'.$row['image1'].'">
        <img class="big"  src="data:image;base64,'.$row['image1'].'">
    </a>
 
    <a href="#" class = "three">
        <img class="thumb" src="data:image;base64,'.$row['image2'].'">
        <img class="big"  src="data:image;base64,'.$row['image2'].'">
    </a>
 

 
    <a href="#">
        <img class="big featured"  src="data:image;base64,'.$row['image'].'">
    </a>
</div>';
}
?>
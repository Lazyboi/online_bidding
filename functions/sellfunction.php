
	
<?php

session_start();
 if(isset($_POST['sumit']))
            {	
$what = $_POST['what'];
$username=$_SESSION["username"];
$category=$_POST['category'];
$qty=$_POST['qty'];
$date=$_POST['date'];
$time = $_POST['time'];
$startprice =$_POST['startprice'];


mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding') or die ("cannot connect to db");
 date_default_timezone_set ("Asia/Hong_kong");


$current = time();
$total=strtotime($date.$time);
if ($total<$current){
	
	Print '<script>alert("Please select a valid date! ");</script>';
	Print '<script>window.location.assign("../sell.php");</script>'; 
}
else {
	
	
}


$start= date("l, F d, Y g:i a");
$notifications= "You successfully post item $what request to the admin, Please wait for approval";
           $query = mysqli_query("INSERT into admin_request (what,username,category,quantity,startdate,date,time,startprice)
				values ('$what','$username','$category','$qty','$start','$date','$time','$startprice')");
                if(getimagesize($_FILES['image']['tmp_name']) == true)
                {
                    $image= addslashes($_FILES['image']['tmp_name']);
                    $name= addslashes($_FILES['image']['name']);
                    $image= file_get_contents($image);
                    $image= base64_encode($image);
                   mysqli_query("update admin_request set image= '$image' where what = '$what'");
               
             
				   if(getimagesize($_FILES['image1']['tmp_name']) == true)
                {
                     $image1= addslashes($_FILES['image1']['tmp_name']);
                    $name1= addslashes($_FILES['image1']['name']);
                    $image1= file_get_contents($image1);
                    $image1= base64_encode($image1);
                   mysqli_query("update admin_request set image1 = '$image1' where what = '$what'");
                
              
              if(getimagesize($_FILES['image2']['tmp_name']) == true)
                {
                    $image2= addslashes($_FILES['image2']['tmp_name']);
                    $name2= addslashes($_FILES['image2']['name']);
                    $image2= file_get_contents($image2);
                    $image2= base64_encode($image2);
                   mysqli_query("update admin_request set image2 = '$image2' where what = '$what'");
                }
             }
 }

         
$updatenotif = mysqli_query("update accounts set notif = 'meron' where username = '$username'");

              
$updatenotifications =mysqli_query("insert into notifications (notifications,username,date,type) values ('$notifications','$username','$start','sell')");

     




}
            Print '<script>alert("You successfully post an item request to the admin, Please wait for approval");</script>';
			Print '<script>window.location.assign("../sell.php");</script>'; 
			

?>
     
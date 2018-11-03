
<?php



mysqli_connect('localhost','root','');
mysqli_select_db('online_bidding');

$delete = mysqli_query("delete from admin_request");


Print '<script>window.location.assign("../adminrequest.php");</script>'; 
?>






<?php

session_start();

session_unset();
session_destroy();
Print '<script>window.location.assign("../index.php");</script>'; 

?>

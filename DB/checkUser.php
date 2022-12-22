<?php 
 if(!$_SESSION['userAdmin']) {
     header('LOCATION: http://localhost/eshop/admin/');
 }
?>
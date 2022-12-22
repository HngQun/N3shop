<?php 
require_once '../../DB/dbConnect.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $qr = mysqli_query($conn,"DELETE FROM `order` WHERE id_order = $id");
   
}
?>
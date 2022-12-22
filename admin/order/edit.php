<?php 
require_once '../../DB/dbConnect.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $status = $_POST['update'];
    $qr = mysqli_query($conn,"UPDATE `order` SET `status`='$status' WHERE id_order = $id");
}
?>
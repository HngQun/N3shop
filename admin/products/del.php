<?php
require_once '../../DB/dbConnect.php';
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$sql_delete = mysqli_query($conn,"DELETE FROM products WHERE id = $id");
if($sql_delete) {
  $sql = mysqli_query($conn,"DELETE FROM img_products WHERE id_sp = $id"); 
    header("LOCATION: index.php");
} else {
    echo "Have some problem !";
}
?>

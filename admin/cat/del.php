<?php
require_once '../../DB/dbConnect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qr = mysqli_query($conn, "DELETE FROM `cat` WHERE id = $id");
    header("LOCATION: index.php");
}

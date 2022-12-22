<?php
session_start();

require_once 'DB/dbConnect.php';


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $qr = "INSERT INTO `order`(`id_customer`, `phone`, `address`, `status`) VALUES ('$id','$phone','$address', '0')";
    $result = mysqli_query($conn, $qr);
    if ($result) {
        
        $id_order = mysqli_insert_id($conn);
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $qr2 = "INSERT INTO `order_detail`(`id`, `id_sp`, `qty`, `price`) VALUES ('$id_order','$key','$value[num]','$value[price]')";
                
                $result = mysqli_query($conn, $qr2);
                //
               
                $qr_edit = mysqli_query($conn, "UPDATE `products` SET `qty` = qty - $value[num] WHERE id = $key");
                //
            }
        }

        unset($_SESSION['cart']);
    }
}


if(isset($_POST['name'])) {
    $name2 = $_POST['name'];
    $message = $_POST['message'];
    $phone2 = $_POST['phone'];
    $email2 = $_POST['email'];
    $qr2 = mysqli_query($conn,"INSERT INTO `contacts`(`name`, `email`, `phone`, `content`) VALUES ('$name2','$email2','$phone2','$message')");
}
?>


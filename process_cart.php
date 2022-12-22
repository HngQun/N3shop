<?php
session_start();
require_once 'DB/dbConnect.php';
if (isset($_POST['id']) && isset($_POST['num'])) {
    $id = $_POST['id'];
    $num = $_POST['num'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!isset($_SESSION['cart'])) {
        $cart = array();
        $cart[$id] = array(
            'name' => $row['name_product'],
            'num' => $num,
            'price' => $row['price'],
            'image' => $row['image']
        );
    } else {
        $cart = $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            $cart[$id] = array(
                'name' => $row['name_product'],
                'num' => (int)$cart[$id]['num'] + $num,
                'price' => $row['price'],
                'image' => $row['image']
            );
        } else {
            $cart[$id] = array(
                'name' => $row['name_product'],
                'num' => $num,
                'price' => $row['price'],
                'image' => $row['image']
            );
        }
    }
    $_SESSION['cart'] = $cart;
    $numberCart = 0;
    foreach($_SESSION['cart'] as $key => $value) {
        $numberCart++;
    }
    echo $numberCart;
}


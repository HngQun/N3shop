<?php
require_once 'DB/dbConnect.php';
if (isset($_POST['id'])) {
    $id_sp = $_POST['id'];
    $id_customer = $_POST['id_customer'];
    $content = $_POST['content'];
    $qr = mysqli_query($conn, "INSERT INTO `product_cmt`(`id_customer`, `id_sp`, `content`) VALUES ('$id_customer','$id_sp','$content')");
}
?>
<div class="comments" id="load">
    <h3 class="comment-title">Bình luận</h3>
    <!-- Single Comment -->
    <br>
    <?php
    $qr2 = mysqli_query($conn, "SELECT `product_cmt`.*, customers.name FROM product_cmt JOIN customers ON product_cmt.id_customer = customers.id WHERE product_cmt.id_sp = $id_sp");
    while ($row = mysqli_fetch_assoc($qr2)) {
    ?>
        <div class="single-comment">
            <div class="content">
                <p><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" width="30px" alt="#"> <?php echo $row['name'] ?> <span>- <?php echo $row['date'] ?></span></p>
                <br>
                <p>-   <?php echo $row['content'] ?></p>
                <br>
            </div>
        </div>
    <?php
    }
    ?>
</div>
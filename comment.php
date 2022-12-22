<?php
require_once 'DB/dbConnect.php';
if (isset($_POST['id'])) {
    $id_blog = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $qr = mysqli_query($conn, "INSERT INTO `comment`(`name`, `email`, `comment`, `id_blog`) VALUES ('$name','$email','$message','$id_blog')");
}
?>
<div class="comments" id="showload">
    <h3 class="comment-title">Bình luận</h3>
    <!-- Single Comment -->
    <?php
    $show = mysqli_query($conn, "SELECT * FROM `comment` WHERE id_blog = $id_blog");
    while ($row = mysqli_fetch_assoc($show)) {
    ?>
        <div class="single-comment">
        <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="#">
            <div class="content">
                <h4><?php echo $row['name'] ?><span><?php echo $row['date'] ?></span></h4>
                <p><?php echo $row['comment'] ?></p>
                <div class="button">
                    <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
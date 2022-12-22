<?php
require_once 'DB/dbConnect.php';
if (isset($_POST['key'])) {
    $key = $_POST['key'];
    $qr2 = mysqli_query($conn, "SELECT * FROM blog WHERE name LIKE '%$key%'");
    if (mysqli_num_rows($qr2)) {
        while ($row = mysqli_fetch_assoc($qr2)) {

?>
            <div class="single-post">
                <div class="image">
                    <img src="admin/upload/<?php echo $row['img'] ?>" alt="#">
                </div>
                <div class="content">
                    <h5><a href="blog-single-sidebar.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></h5>
                    <ul class="comment">
                        <li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['created_at'] ?></li>
                    </ul>
                </div>
            </div>
<?php
        }
    }
}

?>
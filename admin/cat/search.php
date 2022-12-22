<?php
require_once '../../DB/dbConnect.php';
if (isset($_POST['name'])) {
    $qr = "SELECT * FROM cat WHERE name LIKE '%" . $_POST['name'] . "%'";
    $result = mysqli_query($conn, $qr);
    $stt = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stt++;

?>

            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><a href="admin/cat/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Sửa</a> <a href="admin/cat/del.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a></td>
            </tr>

<?php
        }
    }
}
?>
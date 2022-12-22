<?php
require_once '../../DB/dbConnect.php';
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $qr = "SELECT products.*, cat.name AS name_cat FROM products JOIN cat ON products.id_cat = cat.id WHERE name_product LIKE '%$name%'";
    $result = mysqli_query($conn, $qr);
    $stt = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($row_product = mysqli_fetch_assoc($result)) {
            $stt++;

?>

            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $row_product['name_product'] ?></td>
                <td><?php echo $row_product['name_cat'] ?></td>
                <td><img src="admin/upload/<?php echo $row_product['image'] ?>" alt="" width="80px"></td>
                <td><?php echo number_format($row_product['price']) ?></td>
                <td><?php echo $row_product['preview'] ?></td>
                <td><a href="admin/products/edit.php?id=<?php echo $row_product['id'] ?>" class="btn btn-success">Edit</a> <a href="admin/products/del.php?id=<?php echo $row_product['id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>

<?php
        }
    }
}
?>
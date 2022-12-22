<?php
require_once 'DB/dbConnect.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $qr = mysqli_query($conn, "SELECT * FROM order_detail JOIN products ON order_detail.id_sp = products.id WHERE order_detail.id = $id");
    $qr1 = mysqli_query($conn, "SELECT qty FROM order_detail WHERE order_detail.id = $id");
}
?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sản phảm</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stt = 0;
        $sum = 0;
        while ($row = mysqli_fetch_assoc($qr) and $row1 = mysqli_fetch_assoc($qr1)) {
            $stt++;
            $sum += $row1['qty'] * $row['price'];           

        ?>
            <tr>
                <th scope="row"><?php echo $stt ?></th>
                <td><?php echo $row['name_product'] ?></td>
                <td>$ <?php echo $row['price'] ?></td>
                <td><?php echo $row1['qty'] ?></td>
                <td>$ <?php echo $row['price'] * $row1['qty'] ?></td>
            </tr>
        <?php
                    if( $row['qty'] - $row1['qty']< 0){
                        echo ('Số lượng không đủ');
                        $row['qty'] = $row['qty'] - $row1['qty'];
                    }

        }
        ?>
        <tr>
            <td style="font-size: 20px;">Tổng</td>
            <td style="color:orange;font-size: 16px;"> $<?php echo $sum ?></td>
        </tr>

    </tbody>
</table>
<a href="order.php"><button class="btn btn-back">Quay lại</button></a>

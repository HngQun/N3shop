<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `products`");
    $nume_row = mysqli_num_rows($sql);
    $nume_page = ceil($nume_row / 5);
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    } else {
        $current_page = 1;
    }
    $offset = ($current_page - 1) * 5;
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order Detail</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content" id="listCart">
        <div class="container" id="cartx">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $sum = 0;
                            $id = (isset($_GET['id'])) ? $_GET['id'] : '';
                            $qr = mysqli_query($conn, "SELECT * FROM `order_detail` JOIN products ON order_detail.id_sp = products.id WHERE order_detail.id = $id");
                            $qr1 = mysqli_query($conn, "SELECT qty FROM order_detail WHERE order_detail.id = $id");
                            while ($row_detail = mysqli_fetch_assoc($qr) and $row_detail1 = mysqli_fetch_assoc($qr1)) {
                                $stt++;
                                $sum += $row_detail['price'] * $row_detail1['qty'];
                            ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $row_detail['name_product'] ?></td>
                                    <td><img src="admin/upload/<?php echo $row_detail['image'] ?>" width="60px" alt=""></td>
                                    <td>$ <?php echo $row_detail['price'] ?></td>
                                    <td><?php echo $row_detail1['qty'] ?></td>
                                    <td>$<?php echo $row_detail['price'] * $row_detail1['qty'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr style="font-size: 16px;">
                                <td>Tổng giá trị đơn hàng</td>
                                <td colspan="5" style="color:red;">$ <?php echo $sum ?></td>
                            </tr>
                            <?php 
                             if($_SESSION['userAdmin']['role'] == 1) {                 
                            ?>
                            <tr>
                                <td style="color:red">Cập nhật tình trạng</td>
                                <td>
                                    <form action="javascript:void(0)" method="POST">
                                        <select name="update" id="update">
                                            <option value="0">Bỏ qua</option>
                                            <option value="1">Done</option>
                                        </select>
                                        <button type="submit" onclick="updateOrder(<?php echo $id ?>)" name="submit" class="btn-success">Xác nhận đơn hàng</button>
                                    </form>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<br>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function updateOrder(id) {
        var update = $('#update').val();
        $.ajax({
            url: 'admin/order/edit.php',
            method: 'POST',
            data: {
                id: id,
                update: update
            },
            success: function(data) {
                $("#listCart").load("admin/order/ #cartx");
            }
        })
    }
</script>
<?php require_once '../template/inc/footer.php' ?>
<?php $page = "ORD";?>
<?php require_once 'public/inc/header.php' ?>
<!-- Breadcrumbs -->
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <?php require_once 'public/inc/navbar.php' ?>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
</header>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="?quan-ly=order">Đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<section>
    <div class="container" style="min-height: 500px;">
        <div class="row" id="load">
            <div class="col-8">
                <?php
                if (isset($_SESSION['customer'])) {
                    $name = $_SESSION['customer']['name'];
                ?>
                    <li><i class="ti-user"> </i>Xin chào: <?php echo $name ?> </li>
                    <span>Đơn hàng của bạn đã đặt là:</span>
                    <br><br>
                    <table class="table" id="load">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số ĐT</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;
                        $qr = mysqli_query($conn, "SELECT * FROM `order` JOIN customers ON order.id_customer = customers.id");
                        while ($row_order = mysqli_fetch_assoc($qr)) {
                            $stt++;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $stt ?></th>
                                <td><?php echo $row_order['name'] ?></td>
                                <td><?php echo $row_order['phone'] ?></td>
                                <td><?php echo $row_order['created_at'] ?></td>
                                <td><?php if ($row_order['status'] == 0) {
                                        echo '<span style="color: red;">Chờ xử lý</span>';
                                    } else {
                                        echo '<span style="color: green;">Đã xác nhận</span>';
                                    } ?></td>
                                <td><a style="color:blue" href="javascript:void(0)" onclick="orderDetail(<?php echo $row_order['id_order'] ?>)">Chi tiết đơn hàng</a></td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                    <?php
                    if (mysqli_num_rows($qr) == 0) {


                    ?>
                        <tr>
                            <td style="font-size: 20px; color:red">No orders yet</td>
                        </tr>
                    <?php

                    }
                    ?>
                </table>
                <?php
                } else {
                ?>
                <span> <a href="login.html" style="color:red; ">Đăng nhập</a> để xem đơn hàng của bạn</span>
                <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</section>
<br>
<br>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function orderDetail(id) {
        $.post('order_detail.php', {
            'id': id,
            
        }, function(data) {
            $("#load").html(data);
        });
    }
</script>
<?php require_once 'public/inc/footer.php' ?>
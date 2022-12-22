<?php $page = 'ST' ?>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper">
    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `order`");
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
                <div class="col-sm-4">
                    <h1 class="m-0">Thống kê</h1>
                    <br>
                    <br>
                    <?php
                    if (!isset($_POST['submit'])) {
                    ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">Từ ngày</label>
                                <input type="date" class="form-control" name="start">
                            </div>
                            <div class="form-group">    
                                <label for="">Đến</label>
                                <input type="date" class="form-control" name="end">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Tìm" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    <?php
                    } else {
                        $date1 = $_POST['start'];
                        $date2 = $_POST['end'];
                        echo "From {$date1} To {$date2}";
                    ?>
                        <a href="admin/statistical/">Quay lại</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>SĐT</th>
                                <th>Ngày đặt</th>
                                <th>Số lượng</th>
                                <th>Giấ</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            $sum1 = 0;
                            if (isset($_POST['submit'])) {
                                $date1 = $_POST['start'];
                                $date2 = $_POST['end'];
                                $qr = mysqli_query($conn, "SELECT `order`.*,order_detail.*, customers.name FROM `order` JOIN customers ON `order`.id_customer = customers.id JOIN order_detail ON `order`.id_order = order_detail.id WHERE `order`.`created_at` BETWEEN '$date1' AND '$date2' OR `order`.`created_at` LIKE '%$date2%'");
                                while ($row = mysqli_fetch_assoc($qr)) {
                                    $stt++;
                                    $sum1 += $row['price'] * $row['qty'];

                            ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['created_at'] ?></td>
                                        <td><?php echo $row['qty'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['price'] * $row['qty'] ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                $stt = 0;
                                $sum = 0;
                                $qr = mysqli_query($conn, "SELECT `order`.*,order_detail.*, customers.name FROM `order` JOIN customers ON `order`.id_customer = customers.id JOIN order_detail ON `order`.id_order = order_detail.id LIMIT $offset,4");
                                while ($row = mysqli_fetch_assoc($qr)) {
                                    $stt++;
                                    $sum += $row['price'] * $row['qty'];
                                ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['created_at'] ?></td>
                                        <td><?php echo $row['qty'] ?></td>
                                        <td><?php echo $row['price'] ?></td>
                                        <td><?php echo $row['price'] * $row['qty'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            <tr>
                                <td>Total Price</td>
                                <td colspan="6" style="color:orangered">$ 
                                    <?php if (isset($_POST['submit'])) {
                                        echo $sum1;
                                    } else {
                                        echo $sum;
                                    } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="col-sm-6" style="text-align: right;">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    if ($current_page > 1) {
                        $previous = $current_page - 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/statistical?page=<?php echo $previous ?>"><<</a>
                        </li>
                    <?php } ?>
                    <?php
                    for ($i = 1; $i <= $nume_page; $i++) {
                        $active = '';
                        if ($i == $current_page) {
                            $active = 'active';
                        }
                    ?>
                        <li class="page-item <?php echo $active ?>">
                            <a class="page-link" href="admin/statistical?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($current_page < $nume_page) {
                        $next = $current_page + 1;
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/statistical?page=<?php echo $next ?>">Next</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>
<?php require_once '../template/inc/footer.php' ?>
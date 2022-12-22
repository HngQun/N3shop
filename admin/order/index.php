<?php $page = 'OR'?>
<?php require_once '../template/inc/header.php' ?>
<div class="content-wrapper" >
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
                <div class="col-sm-6">
                    <h1 class="m-0">Order Product</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content"  >
        <div class="container" >
            <div class="row" id="listCart">
                <div class="col-sm-12" id="cartx">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Số ĐT</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                            $stt = 0;
                            $qr = mysqli_query($conn, "SELECT * FROM `order` JOIN customers ON order.id_customer = customers.id LIMIT $offset,5");
                            while ($row_order = mysqli_fetch_assoc($qr)) {
                                $stt++;
                            ?>
                                <tr >
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $row_order['name'] ?></td>
                                    <td><?php echo $row_order['phone'] ?></td>
                                    <td><?php echo $row_order['created_at'] ?></td>
                                    <td><?php
                                        if ($row_order['status'] == 0) {
                                            echo '<span style="color: red;">Chờ</span>';
                                        } else {
                                            echo '<span style="color: green;">Đã chốt</span>';
                                        }
                                        ?></td>
                                    <td><a href="admin/order/detail.php?id=<?php echo $row_order['id_order'] ?>" class = "btn btn-primary">Xem đơn hàng</a></td>
                                    <?php 
                                    if($_SESSION['userAdmin']['role'] ==1) {
                                    ?>
                                    <td onclick="return confirm('Are you sure you want to delete this item?');"><a class="btn btn-danger" onclick="delOrder(<?php echo $row_order['id_order'] ?>)" href="javascript:void(0)">Xóa</a></td>
                                    <?php }?>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
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
                            <a class="page-link" href="admin/order?page=<?php echo $previous ?>"><<</a>
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
                            <a class="page-link" href="admin/order?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($current_page < $nume_page) {
                        $next = $current_page + 1;

                    ?>
                        <li class="page-item">
                            <a class="page-link" href="admin/order?page=<?php echo $next ?>">Next</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<br>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function delOrder(id) {
        $.post('admin/order/del.php', {
			'id': id,			
		}, function(data) {
			$("#listCart").load("admin/order/ #cartx");			
		});
    }
</script>
<?php require_once '../template/inc/footer.php' ?>